@extends('layouts.app')

@section('page-title') Lista de Recomendações @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item active"><a>Recomendação</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 text-right mb-4">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary btn-md" href="{{route('recomendacao.create')}}" role="button">
                    Nova Recomendação
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('recomendacao.index') }}" accept-charset="UTF-8"
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
                <h4 class="card_title">Recomendações</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">ACHADO</th>
                                <th scope="col" class="text-center">RECOMENDAÇÃO</th>
                                <th scope="col" class="text-center">BASE LEGAL</th>
                                <th scope="col" class="text-center">CATEGORIAS</th>
                                <th scope="col" class="text-center">LINK</th>
                                <th scope="col" class="text-center">AÇÃO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recomendacoes as $recomendacao)
                            <tr scope="row">
                                <td class="text-center">{{$recomendacao->id}}</td>
                                <td class="text-center">{{$recomendacao->achado}}</td>
                                <td class="text-center">{{$recomendacao->recomendacao}}</td>
                                <td class="text-center">{{$recomendacao->base_legal}}</td>
                                <td class="text-center">{{$recomendacao->categorias->implode('nome', ', ')}}</td>
                                <td class="text-center">
                                    <a href="{{@$recomendacao->links->link}}" target="_black"
                                        title="Clique aqui para acessar o link">
                                        <span class="fa fa-chrome"></span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('recomendacao.edit', $recomendacao->id)}}">
                                        <button class="btn btn-success btn-sm mt-2" title="Editar Registro">
                                            <i class="ti-pencil" data-toggle="tooltip" title="Editar Registro"
                                                style="color: black"></i>
                                        </button>
                                    </a>

                                    <form action="{{route('recomendacao.destroy', $recomendacao->id)}}" method="POST"
                                        id="formLaravel{{$recomendacao->id}}" style="display:inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm submit mt-2" idform="{{$recomendacao->id}}"
                                            title="Excluir Registro">
                                            <i class="fa fa-trash-o" data-toggle="tooltip"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$recomendacoes->appends([
                        'pesquisa' => Request::get('pesquisa'), 
                        'id_tipo_documento' => Request::get('id_tipo_documento'),
                        'id_instituicao' => Request::get('id_instituicao'),
                        'id_esfera' =>  Request::get('id_esfera'),
                        'id_categoria'=> Request::get('id_categoria'),
                        'data' => Request::get('data')
                        ])->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
