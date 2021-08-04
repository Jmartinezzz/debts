<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    protected $fillable = [
        'debtor_id',
        'user_id',
        'total',
        'description',        
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
