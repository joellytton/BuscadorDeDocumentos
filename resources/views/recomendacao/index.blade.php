@extends('layouts.app')

@section('page-title') Lista de Recomendações @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item active"><a>Recomendação</a></li>
</ol>

<div class="card">
    <div class="card-body">
        <div class="text-right">
            <a class="btn btn-primary btn-md" href="{{route('recomendacao.create')}}" role="button">
                Nova Recomendação
            </a>
        </div>
        <br>
        <h4>PESQUISA RECOMENDAÇÃO</h4>
        <hr />
        <form action="{{ url('/recomendacao') }}" method="get">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="wrap">
                        <label for="id_categoria" class="form-control-label ">Categorias:</label>
                        <select class="form-control select" name="id_categoria[]" multiple="multiple">
                            @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}"
                                {{in_array($categoria->id, (empty(request('id_categoria')) ? [] : request('id_categoria'))) ? 'selected' : ''}}>
                                {{$categoria->nome}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="wrap">
                        <label for="search" class="form-control-label">Buscar:</label>
                        <input type="text" class="form-control" name="search" value="{{ request('search') }}">
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-12 col-md-12 col-lg-12 text-center mt-4">
                    <button type="submit" class="btn btn-secondary btn-fixed-w mt-2">
                        Pesquisar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
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
                                <td class="text-center" data-toggle="popover" title="Achado"
                                    data-content="{{$recomendacao->achado}}">
                                    {{mb_strimwidth($recomendacao->achado,0, 80, "...")}}
                                </td>
                                <td class="text-center" data-toggle="popover" title="Recomendação"
                                    data-content="{{$recomendacao->recomendacao}}">
                                    {{mb_strimwidth($recomendacao->recomendacao,0, 80, "...")}}
                                </td>
                                <td class="text-center" data-toggle="popover" title="Base Legal"
                                    data-content="{{$recomendacao->base_legal}}">
                                    {{mb_strimwidth($recomendacao->base_legal,0, 80, "...")}}
                                </td>
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
