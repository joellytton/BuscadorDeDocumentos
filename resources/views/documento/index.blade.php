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
                        <select class="form-control" name="id_tipo_documento">
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
                        <label for="id_emitente" class="form-control-label">Emitente:</label>
                        <select class="form-control" name="id_emitente">
                            <option value="">Selecione uma opção</option>
                            @foreach ($emitentes as $emitente)
                            <option value="{{$emitente->id}}"
                                {{ request('id_emitente') == $emitente->id ? 'selected' : ''}}>
                                {{$emitente->nome}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="wrap">
                        <label for="pesquisa" class="form-control-label">Pesquisa:</label>
                        <input type="text" class="form-control" name="pesquisa" value="{{ request('pesquisa') }}">
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="wrap">
                        <label for="data" class="form-control-label">Data:</label>
                        <input type="date" class="form-control" name="data" value="{{ request('data') }}">
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
                                <th scope="col" class="text-center">TIPO</th>
                                <th scope="col" class="text-center">NUMERO</th>
                                <th scope="col" class="text-center">DOE</th>
                                <th scope="col" class="text-center">DATA</th>
                                <th scope="col" class="text-center">EMITENTE</th>
                                <th scope="col" class="text-center">DESCRIÇÃO</th>
                                <th scope="col" class="text-center">LINK</th>
                                <th scope="col" class="text-center">AÇÃO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documentos as $documento)
                            <tr scope="row">
                                <td class="text-center">{{$documento->tipoDocumento->nome}}</td>
                                <td class="text-center">{{$documento->numero}}</td>
                                <td class="text-center">{{$documento->doe}}</td>
                                <td class="text-center">{{data_iso_para_br($documento->data)}}</td>
                                <td class="text-center">{{$documento->emitente->nome}}</td>
                                <td class="text-center">{{$documento->descricao}}</td>
                                <td class="text-center">
                                    <a href="{{@$documento->links->link}}" target="_black">
                                        {{@$documento->links->link}}
                                    </a>
                                </td>
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
                        'id_emitente' => Request::get('id_emitente'),
                        'data' => Request::get('data')
                        ])->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
