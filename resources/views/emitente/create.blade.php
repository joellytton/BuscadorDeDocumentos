@extends('layouts.app')

@section('page-title') Cadastro de Remetente @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("cadastroBasico.emitente.index")}}">Remetente</a></li>
    <li class="breadcrumb-item active"><a>Cadastrar Remetente</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Cadastrar Remetente</h4>
                <form action="{{route('cadastroBasico.emitente.store')}}" method="POST">
                    @csrf
                    @include('emitente.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection