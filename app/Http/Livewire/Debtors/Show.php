<?php

namespace App\Http\Livewire\Debtors;
use App\Models\Debtor;

use Livewire\Component;

class Show extends Component
{
    public $debtor_id, $name, $description;
    public $view  = 'create';

    protected $rules = [
        'name' => 'required|min:5',
        'description' => 'nullable',
    ];

    public function render()
    {
        // $this->dispatchBrowserEvent('closeModal');
        $debtors = Debtor::all();
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
        $this->emit('debtStore', ['type' => 'save','color' => 'success']);        
    }

    public function delete(Debtor $debtor){
        $debtor->delete();
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
        $this->emit('debtStore', ['type' => 'update','color' => 'success']);  
    }

    public function resetFields(){
        $this->reset(['debtor_id', 'name', 'description']);
    }
}
