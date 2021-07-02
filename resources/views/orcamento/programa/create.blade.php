@extends('layouts.app')

@section('page-title') Cadastro de Programa @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("orcamento.programa.index")}}">Programa</a></li>
    <li class="breadcrumb-item active"><a>Cadastrar Programa</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Cadastrar Programa</h4>
                <form action="{{route('orcamento.programa.store')}}" method="POST">
                    @csrf
                    @include('orcamento.programa.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection