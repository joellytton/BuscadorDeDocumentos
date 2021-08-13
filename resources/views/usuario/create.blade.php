@extends('layouts.app')

@section('page-title') Cadastrar Usuário @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("cadastroBasico.usuario.index")}}">Usuários</a></li>
    <li class="breadcrumb-item active"><a>Cadastrar Usuário</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Cadastrar Usuário</h4>
                <form action="{{route('cadastroBasico.usuario.store')}}" method="POST">
                    @csrf
                    @include('usuario.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection