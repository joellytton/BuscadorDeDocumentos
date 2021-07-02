@extends('layouts.app')

@section('page-title') Lista de Programas @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item active"><a>Programa</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4 text-right">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary btn-md" href="{{route('orcamento.programa.create')}}" role="button">
                    Novo Programa
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Programas</h4>
                <div class="table-responsive">
                    <table id="dataTable" class="table text-center">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">PROGRAMA</th>
                                <th class="text-center">AÇÃO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($funcionalPrograma as $programa)
                            <tr>
                                <td class="text-center">{{$programa->id}}</td>
                                <td class="text-center">{{$programa->cd_programa}}</td>
                                <td class="text-center">
                                    <a href="{{route('orcamento.programa.edit',$programa->id)}}">
                                        <button class="btn btn-success btn-sm" title="Editar Registro">
                                            <i class="ti-pencil" data-toggle="tooltip" title="Editar Registro" style="color: black"></i>
                                        </button>
                                    </a>
                                    &nbsp;
                                    <form action="{{route('orcamento.programa.destroy', $programa->id)}}" method="POST"
                                        id="formLaravel{{$programa->id}}" style="display:inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm submit" idform="{{$programa->id}}"
                                            title="Excluir Registro">
                                            <i class="fa fa-trash-o" data-toggle="tooltip"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
