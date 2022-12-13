@extends('layouts.app')

@section('page-title')Editar Esferas @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("cadastroBasico.esfera.index")}}">Esferas</a></li>
    <li class="breadcrumb-item active"><a>Editar Esfera</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Editar Esfera</h4>
                <form action="{{route('cadastroBasico.esfera.update', $esfera->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('esfera.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset("js/orcamento/funcao/funcao.js")}}"></script>
@endsection

