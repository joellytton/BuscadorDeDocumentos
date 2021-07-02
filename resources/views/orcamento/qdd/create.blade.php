@extends('layouts.app')

@section('page-title') Cadastro de QDD @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("orcamento.qdd.index")}}">QDD</a></li>
    <li class="breadcrumb-item active"><a>Cadastrar QDD</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Cadastrar QDD</h4>
                <form action="{{route('orcamento.qdd.store')}}" method="POST">
                    @csrf
                    @include('orcamento.qdd.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
