@extends('layouts.app')

@section('page-title') Lista de Auditoria @endsection

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
                        <input type="date" class="form-control" name="data_inicio" value="{{ request('data_inicio') }}">
                    </div>
                </div>

                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="wrap">
                        <label for="data_fim" class="form-control-label">Data Fim:</label>
                        <input type="date" class="form-control" name="data_fim" value="{{ request('data_fim') }}">
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

{{-- <div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Lista de acesso ao sistema</h4>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th class="text-center">NOME</th>
                                <th class="text-center">Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($auditorias as $auditoria)
                            <tr>
                                <td class="text-center">{{$auditoria->usuario->nome}}</td>
                                <td class="text-center">0</td>
                                {{
                                $registros = $registros->filter(function ($registros) use ($auditoria) {
                                return $registros->id_usuario == $auditoria->id_usuario;
                                });
                                }}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$auditorias->appends([
                    'data_inicio' => Request::get('data_inicio'),
                    'data_fim' => Request::get('data_fim')])->links() }}
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Lista de acesso ao sistema</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Quantidade</th>
                            <th>Detalhes</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($auditorias as $auditoria)
                        @php
                        //esse trecho aqui eu preciso melhorar em ver der passa o id do usuario
                        //eu preciso passar a collection para evitar varias consultas no banco
                        $registros = retornarRegistrosAuditoriaPorUsuario($auditoria->id_usuario,
                        Request::get('data_inicio'), Request::get('data_fim'));
                        @endphp
                        <tr data-toggle="collapse" data-target="#row{{$auditoria->id_usuario}}"
                            class="accordion-toggle">
                            <td class="text-center">{{$auditoria->usuario->nome}}</td>
                            <td class="text-center">{{$registros->count()}}</td>
                            <td><button class="btn btn-primary btn-sm">Ver detalhes</button></td>

                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="collapse" id="row{{$auditoria->id_usuario}}">
                                    <table class="table table-bordered">
                                        <th>Usuario</th>
                                        <th>IP</th>
                                        <th class="text-center">Data</th>
                                        <tbody>
                                            @foreach ($registros as $registro)
                                            <tr>
                                                <td>{{$registro->usuario->nome}}</td>
                                                <td>{{$registro->IP}}</td>
                                                <td class="text-center">
                                                    {{\Carbon\Carbon::parse($registro->data)->format('d/m/Y H:i:s')}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection