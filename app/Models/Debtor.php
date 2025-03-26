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

    public function total()
    {
        $totals = Debt::where('debtor_id', $this->id)
            ->selectRaw('
                SUM(CASE WHEN type = "charge" THEN total ELSE 0 END) as charges,
                SUM(CASE WHEN type = "payment" THEN total ELSE 0 END) as payments
            ')
            ->first();

        $charges = $totals->charges;
        $payments = $totals->payments;
       
        $totalDebt = $charges - $payments;

        return number_format($totalDebt, 2, '.', ',');
    }
}
