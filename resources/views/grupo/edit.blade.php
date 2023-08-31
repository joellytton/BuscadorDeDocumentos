@extends('layouts.app')

@section('page-title')Editar Grupo @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("cadastroBasico.esfera.index")}}">Grupos</a></li>
    <li class="breadcrumb-item active"><a>Editar Grupo</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Editar Grupo</h4>
                <form action="{{route('cadastroBasico.grupo.update', $grupo->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('grupo.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset("js/orcamento/funcao/funcao.js")}}"></script>
@endsection

