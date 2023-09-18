<?php

use App\Models\AuditoriaLogin;
use Illuminate\Http\Request;

if (!function_exists('data_br_para_iso')) {
    function data_br_para_iso($data)
    {
        return DateTime::createFromFormat('d/m/Y', $data)->format('Y-m-d');
    }
}

if (!function_exists('data_iso_para_br')) {
    function data_iso_para_br($data)
    {
        return (new DateTime($data))->format('d/m/Y');
    }
}

if (!function_exists('verificarPermissao')) {
    function verificarPermissao(?array $arrayPerfil)
    {
        //verificar ser o usuario é administrador
        if (Auth::user()->id_perfil == 1) {
            return true;
        }
        return in_array(Auth::user()->id_perfil, $arrayPerfil);
    }
}

if (!function_exists('retornarRegistrosAuditoriaPorUsuario')) {
    function retornarRegistrosAuditoriaPorUsuario(int $idUsuario, String $dataInicio, String $dataFim)
    {
        $registros = AuditoriaLogin::buscarAuditoriaRegistros($dataInicio, $dataFim);
        $registros = $registros->filter(function ($registros) use ($idUsuario) {
            return $registros->id_usuario == $idUsuario;
        });
        return $registros->sortByDesc('data');
    }
}
