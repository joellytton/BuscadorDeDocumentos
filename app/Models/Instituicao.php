<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $table = 'instituicao';

    protected $fillable = ['nome','status'];

    public $timestamps = false;

    public static function buscaPorNome(int $perPage, string $keyword)
    {
        return self::where('status', 'Ativo')
            ->where('nome', 'LIKE', "%$keyword%")
            ->orderBy('id', 'desc')
            ->paginate($perPage);
    }
}
