@extends('layouts.app')

@section('page-title') Cadastro de Esferas @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("cadastroBasico.esfera.index")}}">Esferas</a></li>
    <li class="breadcrumb-item active"><a>Cadastrar Esfera</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Cadastrar Esfera</h4>
                <form action="{{route('cadastroBasico.esfera.store')}}" method="POST">
                    @csrf
                    @include('esfera.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection