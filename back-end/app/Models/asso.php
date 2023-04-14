<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
class Asso extends Authenticatable
{
    use HasFactory,HasApiTokens;
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'tele',
    ];
    protected $guard='asso';

    public $timestamps=false;
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
