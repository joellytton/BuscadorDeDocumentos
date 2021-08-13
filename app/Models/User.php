<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public $timestamps = false;

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function getNameAttribute()
    {
        return $this->login;
    }

    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = Hash::make($value);
    }

    public static function buscaPorNome(int $perPage, string $keyword): AbstractPaginator
    {
        return self::where('status', 'Ativo')
            ->where('nome', 'LIKE', "%$keyword%")
            ->orWhere('login', 'LIKE', "%$keyword%")
            ->orderBy('id', 'desc')
            ->paginate($perPage);
    }
}
