<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $quantidadeUsuariosAtivoDoSistema = User::where('status', 1)->get()->count();
        
        return view('dashboard', compact(
            'quantidadeUsuariosAtivoDoSistema'
        ));
    }
}
