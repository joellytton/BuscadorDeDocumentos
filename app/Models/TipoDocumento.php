<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;

class TipoDocumento extends Model
{
    protected $table = 'tipo_documento';

    protected $fillable = ['nome', 'status'];

    public $timestamps = false;

    public static function buscaPorNome(int $perPage, string $keyword): AbstractPaginator
    {
        return self::where('status', 'Ativo')
            ->where('nome', 'LIKE', "%$keyword%")
            ->orderBy('id', 'desc')
            ->paginate($perPage);
    }
}
