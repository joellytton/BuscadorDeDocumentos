<?php

namespace App\Models;

use Carbon\Carbon;
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
        'data_expirar',
        'nome',
        'login',
        'senha',
        'id_perfil',
        'telefone',
        'email',
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

    public function setDataExpirarAttribute($value)
    {
        $this->attributes['data_expirar'] = Carbon::parse($value)->format('Y-m-d');
    }

    public static function buscaPorNome(int $perPage, string $keyword): AbstractPaginator
    {
        return self::with('perfil')
            ->Where('status', 'Ativo')
            ->Where('nome', 'LIKE', "%$keyword%")
            ->Where('login', 'LIKE', "%$keyword%")
            ->orderBy('id', 'desc')
            ->paginate($perPage);
    }

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'id_perfil');
    }
}
