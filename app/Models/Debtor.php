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
        $totalDebt = Debt::where('debtor_id', $this->id)->sum('total');

        return number_format($totalDebt, 2, '.', ',');
    }
}
