@extends('layouts.app')

@section('page-title') Editar Programa @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("orcamento.programa.index")}}">Programa</a></li>
    <li class="breadcrumb-item active"><a>Editar Programa</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Editar Programa</h4>
                <form action="{{route('orcamento.programa.update', $funcionalPrograma->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('orcamento.programa.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection