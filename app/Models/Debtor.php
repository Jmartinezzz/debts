<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Debt;

class Debtor extends Model
{
    use HasFactory;

    protected $fillable = [
     'name',
     'description',        
    ];

    public function total(){
        $charges = Debt::where('debtor_id', $this->id)
            ->where('type', 'charge')
            ->sum('total');

        $payments = Debt::where('debtor_id', $this->id)
            ->where('type', 'payment')
            ->sum('total');

        $totalDebt = $charges - $payments;

        return number_format($totalDebt, 2, '.', ',');
    }
}
