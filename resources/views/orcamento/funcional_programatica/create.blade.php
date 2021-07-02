@extends('layouts.app')

@section('page-title') Cadastro de Funcional Programática @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item">
        <a href="{{route("orcamento.funcionalProgramatica.index")}}">
            Funcional Programática
        </a>
    </li>
    <li class="breadcrumb-item active"><a>Cadastrar Funcional Programática</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Cadastrar Funcional Programática</h4>
                <form action="{{route('orcamento.funcionalProgramatica.store')}}" method="POST">
                    @csrf
                    @include('orcamento.funcional_programatica.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

