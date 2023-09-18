<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;

class AuditoriaLogin extends Model
{
    protected $table = 'auditoriaLogin';

    protected $fillable = ['id_usuario', 'IP', 'data'];

    public $timestamps = false;

    public static function buscarAuditoria(Request $request): AbstractPaginator
    {
        $auditoria = self::with('usuario')
            ->select('id_usuario')
            ->whereRaw("DATE_FORMAT(data, '%Y-%m-%d') BETWEEN ? AND ?", [$request->data_inicio, $request->data_fim])
            ->groupBy('id_usuario')
            ->paginate(10);

        return $auditoria;
    }

    public static function buscarAuditoriaRegistros(String $dataInicio, String $dataFim): Collection
    {
        $auditoria = self::with('usuario')
            ->whereRaw("DATE_FORMAT(data, '%Y-%m-%d') BETWEEN ? AND ?", [$dataInicio, $dataFim])
            ->get();

        return $auditoria;
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
