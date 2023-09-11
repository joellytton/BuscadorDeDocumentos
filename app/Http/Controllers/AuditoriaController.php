<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\AuditoriaLogin;

class AuditoriaController extends Controller
{
    public function index(Request $request): View
    {
        $auditorias = AuditoriaLogin::buscarAuditoria($request);
        return view("auditoria.index", compact('auditorias'));
    }
}
