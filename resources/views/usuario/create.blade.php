@extends('layouts.app')

@section('page-title') Cadastrar Usuário @endsection

@section('main-content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{route("cadastroBasico.usuario.index")}}">Usuários</a></li>
    <li class="breadcrumb-item active"><a>Cadastrar Usuário</a></li>
</ol>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title">Cadastrar Usuário</h4>
                <form action="{{route('cadastroBasico.usuario.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
                            <div class="wrap">
                                <label for="nome" class="form-control-label">Nome:
                                    <span class="text-danger" style="font-size: 14px;">*</span>
                                </label>
                                <input type="text" class="form-control focus" name="nome" placeholder="Nome"
                                    value="{{old('nome')}}">
                                @if ($errors->has('nome'))
                                <h6 class="heading text-danger">{{$errors->first('nome')}}</h6>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
                            <div class="wrap">
                                <label for="id_perfil" class="form-control-label">Perfil:
                                    <span class="text-danger" style="font-size: 14px;">*</span>
                                </label>
                                <select class="form-control" name="id_perfil">
                                    <option value="">Selecione uma opção</option>
                                    @foreach ($perfis as $perfil)
                                    <option value="{{$perfil->id}}"
                                        {{old('id_perfil') == $perfil->id ? 'selected' : ''}}>
                                        {{$perfil->nome}}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('id_perfil'))
                                <h6 class="heading text-danger">{{$errors->first('id_perfil')}}</h6>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6 mt-4">
                            <div class="wrap">
                                <label for="login" class="form-control-label">Login:
                                    <span class="text-danger" style="font-size: 14px;">*</span>
                                </label>
                                <input type="text" class="form-control focus" name="login" placeholder="Login"
                                    value="{{old('login')}}">
                                @if ($errors->has('nome'))
                                <h6 class="heading text-danger">{{$errors->first('login')}}</h6>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6 mt-4">
                            <div class="wrap">
                                <label for="senha" class="form-control-label">Senha:
                                    <span class="text-danger" style="font-size: 14px;">*</span>
                                </label>
                                <input type="password" class="form-control focus" name="senha" placeholder="Senha"
                                    value="{{old('senha')}}">
                                @if ($errors->has('senha'))
                                <h6 class="heading text-danger">{{$errors->first('senha')}}</h6>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-5 text-center">
                            <div class="wrap mt-2">
                                <button class="btn btn-success" type="button" value="Submit"
                                    onclick="submitForm(this);">
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
