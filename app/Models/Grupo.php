<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grupo extends Model
{
    protected $table = 'grupo';

    protected $fillable = ['nome','id_usuario','status'];

    public $timestamps = false;

    public static function buscar(int $perPage, string $keyword): AbstractPaginator
    {
        return self::where('status', 'Ativo')
        ->where('nome', 'LIKE', "%$keyword%")
        ->orderBy('id', 'desc')
        ->paginate($perPage);
    }
}
