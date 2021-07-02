@extends('layouts.app')

@section('page-title') Lista de QDD @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item active"><a>QDD</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4 text-right">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary btn-md" href="{{route('orcamento.qdd.create')}}" role="button">
                    Novo QDD
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">QDD</h4>
                <div class="table-responsive">
                    <table id="dataTable" class="table text-center">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th class="text-center">QDD</th>
                                <th class="text-center">AÇÃO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($qdds as $qdd)
                                <tr>
                                    <td class="text-center">{{$qdd->ano_qdd}}</td>
                                    <td class="text-center">
                                        <a href="{{route('orcamento.qdd.show',$qdd->id)}}">
                                            <button class="btn btn-primary btn-sm" title="Dados QDD">
                                                <i class="ti-clipboard" data-toggle="tooltip" title="Dados QDD"></i>
                                            </button>
                                        </a>
                                        &nbsp;
                                        <a href="{{route('orcamento.qdd.edit',$qdd->id)}}">
                                            <button class="btn btn-success btn-sm" title="Editar Registro">
                                                <i class="ti-pencil" data-toggle="tooltip" title="Editar Registro" style="color: black"></i>
                                            </button>
                                        </a>
                                        &nbsp;
                                        <form action="{{route('orcamento.qdd.destroy', $qdd->id)}}" method="POST"
                                            id="formLaravel{{$qdd->id}}" style="display:inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm submit" idform="{{$qdd->id}}"
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
