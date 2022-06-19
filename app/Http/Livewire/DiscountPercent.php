<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DiscountPercent extends Component
{
    public $percent, $amount, $total, $valuePercent, $hide = true;

    public function render()
    {        
        return view('livewire.discount-percent');
    }

    public function calculateDiscount()
    {     
        $this->valuePercent = $this->amount * ($this->percent / 100);
        $this->total = $this->amount - $this->valuePercent;
        $this->hide = false;
    }

    public function clear()
    {        
        $this->reset(['percent', 'amount', 'total', 'valuePercent']);
        $this->hide = true;
    }
}
