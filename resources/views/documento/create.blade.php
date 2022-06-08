@extends('layouts.app')

@section('page-title') Cadastrar Documento @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("documento.index")}}">Documento</a></li>
    <li class="breadcrumb-item active"><a>Cadastrar Documento</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Cadastrar Documento</h4>
                <form action="{{route('documento.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @include('documento.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection