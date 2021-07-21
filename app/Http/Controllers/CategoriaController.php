<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\View\View;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(Request $request): View
    {
        $perPage = 10;
        $keyword =  empty($request->search) ? '' : $request->search;

        $categorias = Categoria::buscar($perPage, $keyword);
        return view('categoria.index', compact('categorias'));
    }

    public function create(): View
    {
        return view('categoria.create');
    }

    public function store(Request $request): Response
    {
        dd($request);
    }

    public function edit(int $id): View
    {
        return view('categoria.edit');
    }

    public function update(Request $request, $id): Response
    {
        dd($request, $id);
    }

    public function destroy(int $id): Response
    {
        dd($id);
    }
}
