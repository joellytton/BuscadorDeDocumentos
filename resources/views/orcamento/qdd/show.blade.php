@extends('layouts.app')

@section('page-title') Cadastro de QDD @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("orcamento.qdd.index")}}">QDD</a></li>
    <li class="breadcrumb-item active"><a>Dados QDD</a></li>
</ol>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 stretched_card">
        <div class="card">
            <div class="card-body">
                <div class="card_title">Dados QDD {{$qdd->ano_qdd}}</div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Quadro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="dotacao-tab" data-toggle="tab" href="#dotacao" role="tab"
                            aria-controls="dotacao" aria-selected="false">Dotação Inicial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="suplementatoReduzido-tab" data-toggle="tab" href="#suplementatoReduzido"
                            role="tab" aria-controls="contact" aria-selected="false">Suplementado/Reduzido</a>
                    </li>
                </ul>
                <div class="tab-content mt-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta soluta doloribus, ullam, ut
                            obcaecati laboriosam eos, officia dolores voluptatum quas impedit placeat cumque animi quos
                            odio quibusdam voluptatibus magnam minima facilis necessitatibus libero! Error velit
                            veritatis veniam ipsa? Reiciendis quas qui neque atque repudiandae quidem incidunt, a
                            consectetur ipsam impedit.</p>
                    </div>
                    <div class="tab-pane fade" id="dotacao" role="tabpanel" aria-labelledby="dotacao-tab">
                        @include('orcamento.qdd.dotacao_inicial.form')
                    </div>
                    <div class="tab-pane fade" id="suplementatoReduzido" role="tabpanel"
                        aria-labelledby="suplementatoReduzido-tab">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta soluta doloribus, ullam, ut
                            obcaecati laboriosam eos, officia dolores voluptatum quas impedit placeat cumque animi quos
                            odio quibusdam voluptatibus magnam minima facilis necessitatibus libero! Error velit
                            veritatis veniam ipsa? Reiciendis quas qui neque atque repudiandae quidem incidunt, a
                            consectetur ipsam impedit.</p>
                    </div>
                    <a href="{{route("orcamento.qdd.index")}}">
                        <button type="button" class="btn btn-primary" id="back-history">
                            <i class="fa fa-arrow-left"></i>
                            Voltar
                        </button>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
