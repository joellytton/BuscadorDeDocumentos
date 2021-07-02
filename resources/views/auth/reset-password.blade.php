@extends('layouts.app')
{{-- Page Title --}}
@section('page-title')
Redefinir Senha
@endsection

@section('main-content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item active"><a>Redefinir Senha</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Redefinir Senha</h4>
                <form action="/redefinir-senha" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4 mt-5">
                            <div class="wrap">
                                <label for="senha" class="form-control-label">Senha:
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control focus" name="senha" placeholder="Senha">
                                @if ($errors->has('senha'))
                                <h6 class="heading text-danger">{{$errors->first('senha')}}</h6>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4 col-lg-4 mt-5">
                            <div class="wrap">
                                <label for="novaSenha" class="form-control-label">Nova Senha:
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control focus" name="novaSenha"
                                    placeholder="Nova Senha">
                                @if ($errors->has('novaSenha'))
                                <h6 class="heading text-danger">{{$errors->first('novaSenha')}}</h6>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4 col-lg-4 mt-5">
                            <br />
                            <div class="wrap mt-2">
                                <button type="submit" class="btn btn-success">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script src="{{asset('js/auth/reset-password.js')}}"></script>

@endsection
