@extends('layouts.app')

@section('page-title') Lista de Documentos @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item active"><a>Documento</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 text-right mb-4">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary btn-md" href="{{route('documento.create')}}" role="button">
                    Novo Documento
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4>PESQUISA DOCUMENTO</h4>
        <hr />
        <form action="{{ url('/documento') }}" method="get">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="wrap">
                        <label for="id_tipo_documento" class="form-control-label">Tipo:</label>
                        <select class="form-control select" name="id_tipo_documento">
                            <option value="">Selecione uma opção</option>
                            @foreach ($tiposDocumento as $documento)
                            <option value="{{$documento->id}}"
                                {{ request('id_tipo_documento') == $documento->id ? 'selected' : ''}}>
                                {{$documento->nome}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="wrap">
                        <label for="id_instituicao" class="form-control-label">Instituições:</label>
                        <select class="form-control select" name="id_instituicao">
                            <option value="">Selecione uma opção</option>
                            @foreach ($instituicoes as $instituicao)
                            <option value="{{$instituicao->id}}"
                                {{ request('id_instituicao') == $instituicao->id ? 'selected' : ''}}>
                                {{$instituicao->nome}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="wrap">
                        <label for="id_esfera" class="form-control-label">Esfera:</label>
                        <select class="form-control" name="id_esfera">
                            <option value="">Selecione uma opção</option>
                            @foreach ($esferas as $esfera)
                            <option value="{{$esfera->id}}" {{ request('id_esfera') == $esfera->id ? 'selected' : ''}}>
                                {{$esfera->nome}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-12 col-md-3 col-lg-3">
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

                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="wrap">
                        <label for="data" class="form-control-label">Data:</label>
                        <input type="date" class="form-control" name="data" value="{{ request('data') }}">
                    </div>
                </div>

                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="wrap">
                        <label for="id_situacao" class="form-control-label ">Situacao:</label>
                        <select class="form-control" name="id_situacao">
                            <option value="">Selecione uma opção</option>
                            @foreach ($situacoes as $situacao)
                            <option value="{{$situacao->id}}"
                                {{ request('id_situacao') == $situacao->id ? 'selected' : ''}}>
                                {{$situacao->nome}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="wrap">
                        <label for="pesquisa" class="form-control-label">Pesquisa:</label>
                        <input type="text" class="form-control" name="pesquisa" value="{{ request('pesquisa') }}">
                    </div>
                </div>


            </div>

            <div class="row mt-5">
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
                <h4 class="card_title">Documentos</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th scope="col" class="text-center">ESFERA</th>
                                <th scope="col" class="text-center">TIPO</th>
                                <th scope="col" class="text-center">NUMERO</th>
                                <th scope="col" class="text-center">DIÁRIO ELETRÔNICO</th>
                                <th scope="col" class="text-center">DATA</th>
                                <th scope="col" class="text-center">INSTITUIÇÃO</th>
                                <th scope="col" class="text-center">DESCRIÇÃO</th>
                                <th scope="col" class="text-center">LINK</th>
                                <th scope="col" class="text-center">SITUACAO</th>
                                <th scope="col" class="text-center">AÇÃO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documentos as $documento)
                            <tr scope="row">
                                <td class="text-center">{{@$documento->esfera->nome}}</td>
                                <td class="text-center">{{$documento->tipoDocumento->nome}}</td>
                                <td class="text-center">{{$documento->numero}}</td>
                                <td class="text-center">{{$documento->doe}}</td>
                                <td class="text-center">{{data_iso_para_br($documento->data)}}</td>
                                <td class="text-center">{{$documento->instituicao->nome}}</td>
                                <td class="text-center">{{$documento->descricao}}</td>
                                <td class="text-center">
                                    @if (@$documento->links->fisico == 1)
                                    <a href="{{(@$documento->links->link)}}" target="_black"
                                        title="Clique aqui para acessar o link">
                                        <span class="fa fa-chrome"></span>
                                    </a>
                                    @else
                                    <a href="{{@$documento->links->link}}" target="_black"
                                        title="Clique aqui para acessar o link">
                                        <span class="fa fa-chrome"></span>
                                    </a>
                                    @endif

                                </td>
                                <td class="text-center">{{$documento->situacao->nome}}</td>
                                <td class="text-center">
                                    <a href="{{route('documento.edit', $documento->id)}}">
                                        <button class="btn btn-success btn-sm mt-2" title="Editar Registro">
                                            <i class="ti-pencil" data-toggle="tooltip" title="Editar Registro"
                                                style="color: black"></i>
                                        </button>
                                    </a>

                                    <form action="{{route('documento.destroy', $documento->id)}}" method="POST"
                                        id="formLaravel{{$documento->id}}" style="display:inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm submit mt-2" idform="{{$documento->id}}"
                                            title="Excluir Registro">
                                            <i class="fa fa-trash-o" data-toggle="tooltip"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$documentos->appends([
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
