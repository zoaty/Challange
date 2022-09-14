<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Authentication extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'userName',
        'userEmail',
        'password',
    ];
}
