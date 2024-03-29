@extends('layouts.app')

@section('page-title') Lista de Usuários @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item active"><a>Usuários</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 text-right mb-4">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary btn-md" href="{{route('cadastroBasico.usuario.create')}}" role="button">
                    Novo Usuário
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ url('/cadastroBasico/usuario') }}" accept-charset="UTF-8"
                    class="form-inline my-2 my-lg-0 float-right" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Buscar..."
                            value="{{ request('search') }}">
                        <span class="input-group-append">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <br />
                <br />
                <h4 class="card_title">Usuários</h4>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">NOME</th>
                                <th class="text-center">LOGIN</th>
                                <th class="text-center">PERFIL</th>
                                <th class="text-center">GRUPOS</th>
                                <th class="text-center">AÇÃO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr scope="row">
                                <td class="text-center">{{$usuario->id}}</td>
                                <td class="text-center">{{$usuario->nome}}</td>
                                <td class="text-center">{{$usuario->login}}</td>
                                <td class="text-center">{{$usuario->perfil->nome}}</td>
                                <td class="text-center">
                                    {{$usuario->grupos->implode('nome', ', ')}}
                                </td>
                                <td class="text-center">
                                    <a href="{{route('cadastroBasico.usuario.edit', $usuario->id)}}">
                                        <button class="btn btn-success btn-sm mt-2" title="Editar Registro">
                                            <i class="ti-pencil" data-toggle="tooltip" title="Editar Registro"
                                                style="color: black"></i>
                                        </button>
                                    </a>
                                    <form action="{{route('cadastroBasico.usuario.destroy', $usuario->id)}}"
                                        method="POST" id="formLaravel{{$usuario->id}}" style="display:inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm submit mt-2" idform="{{$usuario->id}}"
                                            title="Excluir Registro">
                                            <i class="fa fa-trash-o" data-toggle="tooltip"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$usuarios->appends(['search' => Request::get('search')])->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
