@extends('layouts.app')

@section('page-title') Lista de Funções @endsection

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

<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ url('/documento') }}" accept-charset="UTF-8"
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
                <h4 class="card_title">Documentos</h4>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th class="text-center">TIPO</th>
                                <th class="text-center">NUMERO</th>
                                <th class="text-center">DOE</th>
                                <th class="text-center">DATA</th>
                                <th class="text-center">EMITENTE</th>
                                <th class="text-center">AÇÃO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documentos as $documento)
                            <tr>
                                <td class="text-center">{{$documento->tipoDocumento->nome}}</td>
                                <td class="text-center">{{$documento->numero}}</td>
                                <td class="text-center">{{$documento->doe}}</td>
                                <td class="text-center">{{data_iso_para_br($documento->data)}}</td>
                                <td class="text-center">{{$documento->emitente->nome}}</td>
                                <td class="text-center">
                                    <a href="{{route('documento.edit', $documento->id)}}">
                                        <button class="btn btn-success btn-sm" title="Editar Registro">
                                            <i class="ti-pencil" data-toggle="tooltip" title="Editar Registro"
                                                style="color: black"></i>
                                        </button>
                                    </a>
                                    &nbsp;
                                    <form action="{{route('documento.destroy', $documento->id)}}" method="POST"
                                        id="formLaravel{{$documento->id}}" style="display:inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm submit" idform="{{$documento->id}}"
                                            title="Excluir Registro">
                                            <i class="fa fa-trash-o" data-toggle="tooltip"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                        {{$documentos->appends(['search' => Request::get('search')])->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
