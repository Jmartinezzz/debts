<?php

namespace App\Http\Livewire\Debtors;
use App\Models\Debtor;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        $debtors = Debtor::all();
        return view('livewire.debtors.show', [
            'debtors' => $debtors
        ]);
    }
}
