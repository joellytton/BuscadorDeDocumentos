@extends('layouts.app')

@section('page-title')Editar Recomendação @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("documento.index")}}">Recomendação</a></li>
    <li class="breadcrumb-item active"><a>Editar Recomendação</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Editar Recomendação</h4>
                <form action="{{route('recomendacao.update', $recomendacao->id)}}" enctype="multipart/form-data"
                    method="POST">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    @include('recomendacao.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
