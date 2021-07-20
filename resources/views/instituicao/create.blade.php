@extends('layouts.app')

@section('page-title') Cadastro de Instituição @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("cadastroBasico.instituicao.index")}}">Instituições</a></li>
    <li class="breadcrumb-item active"><a>Cadastrar Instituição</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Cadastrar Instituição</h4>
                <form action="{{route('cadastroBasico.instituicao.store')}}" method="POST">
                    @csrf
                    @include('instituicao.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection