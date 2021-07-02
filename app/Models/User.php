<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'usuario';

    protected $fillable = [
        'nome',
        'login',
        'senha',
        'status'
    ];

    protected $hidden = ['senha'];

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function getNameAttribute()
    {
        return $this->login;
    }
}
