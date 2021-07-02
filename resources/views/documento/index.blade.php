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
            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
