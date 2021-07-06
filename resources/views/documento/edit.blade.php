@extends('layouts.app')

@section('page-title')Editar Documento @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("documento.index")}}">Documento</a></li>
    <li class="breadcrumb-item active"><a>Editar Documento</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Editar Documento</h4>
                <form action="{{route('documento.update', $documentos->id)}}" method="POST">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    @include('documento.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
