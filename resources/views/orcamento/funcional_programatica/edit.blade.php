@extends('layouts.app')

@section('page-title') Editar Funcional Programática @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("orcamento.funcionalProgramatica.index")}}">Funcional Programática</a>
    </li>
    <li class="breadcrumb-item active"><a>Editar Funcional Programática</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Editar Funcional Programática</h4>
                <form action="{{route('orcamento.funcionalProgramatica.update', $funcionalProgramatica->id)}}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    @include('orcamento.funcional_programatica.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
