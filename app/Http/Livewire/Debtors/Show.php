<?php

namespace App\Http\Livewire\Debtors;
use App\Models\Debtor;

use Livewire\Component;

class Show extends Component
{
    public $debtor_id, $name, $description, $search;
    public $view  = 'create';

    protected $listeners = [
        'confirmedToDelete',
        'cancelled'
    ];

    protected $rules = [
        'name' => 'required|min:4',
        'description' => 'nullable',
    ];

    public function render()
    {
        // $this->dispatchBrowserEvent('closeModal');
        $debtors = Debtor::where('name', 'LIKE', '%'.$this->search.'%')->get();
        $debtors = $debtors->sortByDesc(function($debtor){
            return $debtor->total();
        });
        return view('livewire.debtors.show', [
            'debtors' => $debtors
        ]);
    }

    public function store(){
        $this->validate();
     
        Debtor::create([
            'name' => $this->name,
            'description' => $this->description
        ]);
        $this->resetFields();
        $this->emit('debtStore', ['type' => 'save']);  
        $this->alert(
            'success',
            'Registro Guardado',
            [
                'position' =>  'center',  
            ]
        );
          
    }

    public function confirmedToDelete(){
        Debtor::find($this->debtor_id)->delete();
        $this->alert(
            'success',
            "Se elimino a $this->name",
             [
                'position' =>  'center',  
            ]
        );
        $this->resetFields();     
    }

    public function cancelled(){        
        $this->alert('info', 'No se elimino nada', [
                'position' =>  'center',  
            ]);
    }

    public function edit(Debtor $debtor){
        $this->name = $debtor->name;
        $this->description = $debtor->description;
        $this->debtor_id = $debtor->id;
        
    }  


    public function update(Debtor $debtor){
        $this->validate();
        $debtor->update([
            'name' => $this->name,
            'description' => $this->description
        ]);

        $this->resetFields();        
        $this->emit('debtStore', ['type' => 'update']);  
        $this->alert(
            'success',
            'Registro Actualizado',
             [
                'position' =>  'center',  
            ]
        );
    }       

    public function resetFields(){
        $this->reset(['debtor_id', 'name', 'description']);
    } 

    public function wantoDelete(Debtor $debtor){
        $this->debtor_id = $debtor->id;
        $this->name = $debtor->name;
        $this->confirm("¿Seguro de eliminar a $debtor->name?", [
            'toast' => true,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  'Si, borrar',
            'cancelButtonText' => 'Cancelar',
            'onConfirmed' => 'confirmedToDelete',
            'onCancelled' => 'cancelled'
        ]);
    }
}
