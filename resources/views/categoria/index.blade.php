@extends('layouts.app')

@section('page-title') Lista de Categorias @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item active"><a>Categorias</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 text-right mb-4">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary btn-md" href="{{route('cadastroBasico.tipoDocumento.create')}}" role="button">
                    Nova Categoria
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ url('/cadastroBasico/tipoDocumento') }}" accept-charset="UTF-8"
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
                <h4 class="card_title">Categorias</h4>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">NOME</th>
                                <th class="text-center">AÇÃO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                            <tr>
                                <td class="text-center">{{$categoria->id}}</td>
                                <td class="text-center">{{$categoria->nome}}</td>
                                <td class="text-center">
                                    <a href="{{route('cadastroBasico.tipoDocumento.edit',$categoria->id)}}">
                                        <button class="btn btn-success btn-sm" title="Editar Registro">
                                            <i class="ti-pencil" data-toggle="tooltip" title="Editar Registro"
                                                style="color: black"></i>
                                        </button>
                                    </a>
                                    &nbsp;
                                    <form action="{{route('cadastroBasico.tipoDocumento.destroy', $categoria->id)}}"
                                        method="POST" id="formLaravel{{$categoria->id}}" style="display:inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm submit" idform="{{$categoria->id}}"
                                            title="Excluir Registro">
                                            <i class="fa fa-trash-o" data-toggle="tooltip"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$categorias->appends(['search' => Request::get('search')])->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
