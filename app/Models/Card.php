<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'user_id',
        'card_user_name',
        'card_user_surname',
        'card_number',
        'card_expiry_date',
        'card_CCV',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
