<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        'balance_id',
        'user_id',
        'user_balance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
