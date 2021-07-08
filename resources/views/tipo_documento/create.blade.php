@extends('layouts.app')

@section('page-title') Cadastrar Tipo Documento @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("cadastroBasico.tipoDocumento.index")}}">Tipo Documento</a></li>
    <li class="breadcrumb-item active"><a>Cadastrar Tipo Documento</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Cadastrar Tipo Documento</h4>
                <form action="{{route('cadastroBasico.tipoDocumento.store')}}" method="POST">
                    @csrf
                    @include('tipo_documento.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection