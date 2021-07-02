@extends('layouts.app')

@section('page-title') Lista de Sub Funções @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item active"><a>Sub Função</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4 text-right">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary btn-md" href="{{route('orcamento.sub_funcao.create')}}" role="button">
                    Nova Sub Função
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Sub Funções</h4>
                <div class="table-responsive">
                    <table id="dataTable" class="table text-center">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">SUB FUNÇÃO</th>
                                <th class="text-center">AÇÃO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($funcionalSubFuncao as $subFuncao)
                            <tr>
                                <td class="text-center">{{$subFuncao->id}}</td>
                                <td class="text-center">{{$subFuncao->cd_subfuncao}}</td>
                                <td class="text-center">
                                    <a href="{{route('orcamento.sub_funcao.edit',$subFuncao->id)}}">
                                        <button class="btn btn-success btn-sm" title="Editar Registro">
                                            <i class="ti-pencil" data-toggle="tooltip" title="Editar Registro" style="color: black"></i>
                                        </button>
                                    </a>
                                    &nbsp;
                                    <form action="{{route('orcamento.sub_funcao.destroy', $subFuncao->id)}}" method="POST"
                                        id="formLaravel{{$subFuncao->id}}" style="display:inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm submit" idform="{{$subFuncao->id}}"
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
