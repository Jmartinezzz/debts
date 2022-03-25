<?php

namespace App\Http\Livewire\Debtors;
use App\Models\Debtor;
use App\Models\Debt;


use Livewire\Component;

class Detail extends Component
{
    public $debtor, $totalDebt = 0.0, $debt_id, $total, $description, $type;

    protected $listeners = [
        'confirmedToDelete',
        'cancelled',
        'confirmedToReset'
    ];

    protected $rules = [
        'total' => 'required|min:0.01',
        'description' => 'nullable',
    ];


    public function render()
    {

        $debts = Debt::where('debtor_id', $this->debtor->id)->with('user:id,name')->get();
        return view('livewire.debtors.detail', ['debts' => $debts]);
    }

    public function save(){
        $this->validate();
        Debt::create([
            'debtor_id' => $this->debtor->id,
            'user_id' => auth()->user()->id,
            'total' => $this->total,
            'type' => $this->type,
            'description' => $this->description,
        ]);
        $this->resetFields();    
        $this->emit('debtsStore', ['type' => 'save']);  
        $this->alert(
            'success',
            'Registro Guardado',
            [
              'position' =>  'center',           
            ]);         
    }

    public function confirmedToDelete(){
        Debt::find($this->debt_id)->delete();
        $this->alert(
            'success',
            "Se elimino el registro con valor de  $this->total",
            [
              'position' =>  'center',           
            ]);  
        $this->resetFields();     
    }   

    public function edit(Debt $debt){
        $this->total = $debt->total;
        $this->description = $debt->description;
        $this->debt_id = $debt->id;
        
    }

    public function update(Debt $debt){
        $this->validate();
        $debt->update([
            'total' => $this->total,
            'description' => $this->description
        ]);

        $this->resetFields();        
        $this->emit('debtsStore', ['type' => 'update']);  
        $this->alert(
            'success',
            'Registro Actualizado',
            [
              'position' =>  'center',           
            ]); 
    }

    public function confirmedToReset(){
        $name = $this->debtor->name;
        $ids = Debt::where('debtor_id', $this->debtor->id)->pluck('id');
        Debt::destroy($ids);
        $this->alert(
            'success',
            "Se reestablecio la deuda de $name a $0.0",
            [
              'position' =>  'center',           
            ]);        
        $this->resetFields();     
    }

    public function cancelled(){  
        $this->resetFields();        
        $this->alert('info', 'No se elimino nada',[
          'position' =>  'center',           
        ]);
    }

    public function resetFields(){
        $this->reset(['debt_id', 'total', 'description']);
    } 

    public function wantoDelete(Debt $debt){
        $this->debt_id = $debt->id;
        $this->total = $debt->total;
        $this->confirm("¿Seguro de eliminar el total de $ $debt->total?", [
            'toast' => true,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  'Si, borrar',
            'cancelButtonText' => 'Cancelar',
            'onConfirmed' => 'confirmedToDelete',
            'onCancelled' => 'cancelled'
        ]);
    }

    public function wantoReset(){  
        $name =$this->debtor->name;     
        $this->confirm("¿Seguro de restablecer la deuda de $name a $0.0?", [
            'toast' => true,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  'Si, reestablercer',
            'cancelButtonText' => 'Cancelar',
            'onConfirmed' => 'confirmedToReset',
            'onCancelled' => 'cancelled'
        ]);
    }

    public function setType($value) {
        $this->type = $value;
    }
}
