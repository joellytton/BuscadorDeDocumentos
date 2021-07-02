@extends('layouts.app')

@section('page-title') Lista de Funcional Programática @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item active"><a>Funcional Programática</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4 text-right">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary btn-md" href="{{route('orcamento.funcionalProgramatica.create')}}"
                    role="button">
                    Nova Funcional Programática
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Funcional Programática</h4>
                <div class="table-responsive">
                    <table id="dataTable" class="table text-center">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">ANO</th>
                                <th class="text-center">DESCRIÇÃO</th>
                                <th class="text-center">CÓDIGO</th>
                                <th class="text-center">FUNÇÃO</th>
                                <th class="text-center">SUBFUNÇÃO</th>
                                <th class="text-center">PROGRAMA</th>
                                <th class="text-center">AÇÃO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($funcionalProgramatica as $funcional)
                            <tr>
                                <td class="text-center">{{$funcional->id}}</td>
                                <td class="text-center">{{$funcional->ano_funcional_programatica}}</td>
                                <td class="text-center">{{$funcional->ds_funcional_programatica}}</td>
                                <td class="text-center">{{$funcional->cd_funcional_programatica}}</td>
                                <td class="text-center">{{$funcional->funcao->cd_funcao}}</td>
                                <td class="text-center">{{$funcional->subFuncao->cd_subfuncao}}</td>
                                <td class="text-center">{{$funcional->programa->cd_programa}}</td>
                                <td class="text-center">
                                    <a href="{{route('orcamento.funcionalProgramatica.edit', $funcional->id)}}">
                                        <button class="btn btn-success btn-sm" title="Editar Registro">
                                            <i class="ti-pencil" data-toggle="tooltip" title="Editar Registro"
                                                style="color: black"></i>
                                        </button>
                                    </a>
                                    &nbsp;
                                    <form action="{{route('orcamento.funcionalProgramatica.destroy', $funcional->id)}}"
                                        method="POST" id="formLaravel{{$funcional->id}}" style="display:inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm submit" idform="{{$funcional->id}}"
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
