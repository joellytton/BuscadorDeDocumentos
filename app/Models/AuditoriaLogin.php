<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\LengthAwarePaginator;

class AuditoriaLogin extends Model
{
    protected $table = 'auditoriaLogin';

    protected $fillable = ['id_usuario', 'IP', 'data'];

    public $timestamps = false;

    public static function buscarAuditoria(Request $request): AbstractPaginator
    {
        $auditoria = self::with('usuario')
            ->whereRaw("DATE_FORMAT(data, '%Y-%m-%d') BETWEEN ? AND ?", [$request->data_inicio, $request->data_fim])
            ->orderBy('id', 'desc');

        $auditoria = $auditoria->groupBy('id_usuario')->map(function ($grupo) {
            return $grupo->sortBy('data');
        });


        return $auditoria;
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
