<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

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
        $requestData = $request->all();
        $requestData['id_usuario'] = Auth::id();

        DB::beginTransaction();

        $categoria = Categoria::create($requestData);

        if (!$categoria) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.categoria.index')
                ->with('error', "Falha ao cadastrar um categoria.");
        }

        DB::commit();
        return redirect()->route('cadastroBasico.categoria.index')
            ->with('success', "Categoria cadastrada com sucesso.");
    }

    public function edit(int $id): View
    {
        $categoria = Categoria::findOrFail($id);
        return view('categoria.edit', compact('categoria'));
    }

    public function update(Request $request, $id): Response
    {
        $requestData = $request->all();
        $requestData['id_usuario'] = Auth::id();

        DB::beginTransaction();

        $categoria = Categoria::findOrFail($id);

        if (!$categoria->update($requestData)) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.categoria.index')
                ->with('error', "Falha ao alterada uma categoria.");
        }

        DB::commit();
        return redirect()->route('cadastroBasico.categoria.index')
            ->with('success', "Categoria alterada com sucesso.");
    }

    public function destroy(int $id): Response
    {
        $categoria = Categoria::findOrFail($id);

        DB::beginTransaction();

        if (!$categoria->update(['status' => 'Inativo'])) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.categoria.index')
                ->with('error', "Falha ao deletar uma categoria.");
        }

        DB::commit();
        return redirect()->route('cadastroBasico.categoria.index')
            ->with('success', "Categoria deletada com sucesso.");
    }
}
