@extends('layouts.app')

@section('page-title') Cadastro de Função @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("orcamento.funcao.index")}}">Função</a></li>
    <li class="breadcrumb-item active"><a>Cadastrar Função</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Cadastrar Função</h4>
                <form action="{{route('orcamento.funcao.store')}}" method="POST">
                    @csrf
                    @include('orcamento.funcao.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection