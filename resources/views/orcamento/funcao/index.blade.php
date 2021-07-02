@extends('layouts.app')

@section('page-title') Lista de Funções @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item active"><a>Função</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 text-right mb-4">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary btn-md" href="{{route('orcamento.funcao.create')}}" role="button">
                    Nova Função
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Funções</h4>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">FUNÇÃO</th>
                                <th class="text-center">AÇÃO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($funcionalFuncao as $funcao)
                            <tr>
                                <td class="text-center">{{$funcao->id}}</td>
                                <td class="text-center">{{$funcao->cd_funcao}}</td>
                                <td class="text-center">
                                    <a href="{{route('orcamento.funcao.edit',$funcao->id)}}" >
                                        <button class="btn btn-success btn-sm" title="Editar Registro">
                                            <i class="ti-pencil" data-toggle="tooltip" title="Editar Registro" style="color: black"></i>
                                        </button>
                                    </a>
                                    &nbsp;
                                    <form action="{{route('orcamento.funcao.destroy', $funcao->id)}}" method="POST"
                                        id="formLaravel{{$funcao->id}}" style="display:inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm submit" idform="{{$funcao->id}}"
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
