<?php

namespace App\Http\Livewire\Debtors;
use App\Models\Debtor;
use App\Models\Debt;


use Livewire\Component;

class Detail extends Component
{
    public $debtor, $totalDebt = 0.0;

    public function render()
    {
        $debts = Debt::where('debtor_id', $this->debtor->id)->with('user:id,name')->get();
        return view('livewire.debtors.detail', ['debts' => $debts]);
    }
}
