@extends('layouts.app')

@section('page-title') Cadastro de Categorias @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("cadastroBasico.categoria.index")}}">Categorias</a></li>
    <li class="breadcrumb-item active"><a>Cadastrar Categoria</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Cadastrar Categoria</h4>
                <form action="{{route('cadastroBasico.categoria.store')}}" method="POST">
                    @csrf
                    @include('categoria.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection