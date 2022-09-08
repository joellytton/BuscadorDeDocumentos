@extends('layouts.app')

@section('page-title') Cadastrar Recomendação @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("recomendacao.index")}}">Recomendação</a></li>
    <li class="breadcrumb-item active"><a>Cadastrar Recomendação</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Cadastrar Recomendação</h4>
                <form action="{{route('recomendacao.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @include('recomendacao.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection