<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;

class AuditoriaLogin extends Model
{
    protected $table = 'auditoriaLogin';

    protected $fillable = ['id_usuario', 'IP', 'data'];
    
    public $timestamps = false;

    public static function buscarAuditoria(Request $request): AbstractPaginator
    {
        $auditoria = self::with('usuario')->orderBy('id', 'desc')->paginate(10);

        return $auditoria;
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
