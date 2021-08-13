<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $perPage = 10;
        $keyword =  empty($request->search) ? '' : $request->search;

        $usuarios = User::buscaPorNome($perPage, $keyword);
        return view('usuario.index', compact('usuarios'));
    }

    public function create(): View
    {
        return view('usuario.create');
    }

    public function store(UserRequest $request): Response
    {
        DB::beginTransaction();

        $usuario =  User::create($request->all());
        
        if (!$usuario) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.categoria.index')
                ->with('error', "Falha ao cadastrar um categoria.");
        }

        DB::commit();
        return redirect()->route('cadastroBasico.usuario.index')
            ->with('success', "Usuário cadastrado com sucesso.");
    }

    public function edit($id): View
    {
        $usuario = User::findOrFail($id);
        return view('usuario.edit', compact('usuario'));
    }

    public function update(UserRequest $request, $id)
    {
        $usuario = User::findOrFail($id);

        DB::beginTransaction();

        if (!$usuario->update($request->all())) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.usuario.index')
                ->with('error', "Falha ao alterar um usuário.");
        }

        DB::commit();
        return redirect()->route('cadastroBasico.usuario.index')
            ->with('success', "Usuário alterado com sucesso.");
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        DB::beginTransaction();

        if (!$usuario->update(['status' => 'Inativo'])) {
            DB::rollBack();
            return redirect()->route('cadastroBasico.usuario.index')
                ->with('error', "Falha ao deletar um usuário.");
        }

        DB::commit();
        return redirect()->route('cadastroBasico.usuario.index')
            ->with('success', "Usuário deletado com sucesso.");
    }
}
