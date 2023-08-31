@extends('layouts.app')

@section('page-title') Cadastro de Grupo @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("cadastroBasico.grupo.index")}}">Grupos</a></li>
    <li class="breadcrumb-item active"><a>Cadastrar Grupo</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Cadastrar Grupo</h4>
                <form action="{{route('cadastroBasico.grupo.store')}}" method="POST">
                    @csrf
                    @include('grupo.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection