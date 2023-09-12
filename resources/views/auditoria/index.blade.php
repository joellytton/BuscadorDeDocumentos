@extends('layouts.app')

@section('page-title') Lista de Categorias @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Início</a></li>
    <li class="breadcrumb-item active"><a>Auditoria</a></li>
</ol>

<div class="card">
    <div class="card-body">
        <h4>PESQUISA AUDITORIA</h4>
        <hr />
        <form action="{{ url('/auditoria') }}" method="get">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="wrap">
                        <label for="data_inicio" class="form-control-label">Data Inicio:</label>
                        <input type="date" class="form-control" name="data_inicio" value="{{ request('data') }}">
                    </div>
                </div>

                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="wrap">
                        <label for="data_fim" class="form-control-label">Data Fim:</label>
                        <input type="date" class="form-control" name="data_fim" value="{{ request('data') }}">
                    </div>
                </div>

                <div class="col-sm-12 col-md-3 col-lg-3 mt-4">
                    <button type="submit" class="btn btn-secondary btn-fixed-w mt-2">
                        Pesquisar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Lista de acesso ao sistema</h4>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th class="text-center">NOME</th>
                                <th class="text-center">IP</th>
                                <th class="text-center">DATA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($auditorias as $auditoria)
                            <tr>
                                <td class="text-center">{{$auditoria->usuario->nome}}</td>
                                <td class="text-center">{{$auditoria->IP}}</td>
                                <td class="text-center">{{\Carbon\Carbon::parse($auditoria->data)->format('d/m/Y
                                    H:i:s')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$auditorias->appends(['search' => Request::get('search')])->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection