<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;

class Esfera extends Model
{
    protected $table = 'esfera';

    protected $fillable = ['nome','status'];

    public $timestamps = false;

    public static function buscar(int $perPage, string $keyword): AbstractPaginator
    {
        return self::where('status', 'Ativo')
        ->where('nome', 'LIKE', "%$keyword%")
        ->orderBy('id', 'desc')
        ->paginate($perPage);
    }
}
