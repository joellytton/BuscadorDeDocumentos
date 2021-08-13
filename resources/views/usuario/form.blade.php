<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
        <div class="wrap">
            <label for="nome" class="form-control-label">Nome:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>
            <input type="text" class="form-control focus" name="nome" placeholder="Nome"
                value="{{@$usuario->nome}}">
            @if ($errors->has('nome'))
            <h6 class="heading text-danger">{{$errors->first('nome')}}</h6>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3 mt-4">
        <div class="wrap">
            <label for="login" class="form-control-label">Login:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>
            <input type="text" class="form-control focus" name="login" placeholder="Login"
                value="{{@$usuario->login}}">
            @if ($errors->has('nome'))
            <h6 class="heading text-danger">{{$errors->first('login')}}</h6>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3 mt-4">
        <div class="wrap">
            <label for="senha" class="form-control-label">Senha:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>
            <input type="password" class="form-control focus" name="senha" placeholder="Senha">
            @if ($errors->has('senha'))
            <h6 class="heading text-danger">{{$errors->first('senha')}}</h6>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 mt-5 text-center">
        <div class="wrap mt-2">
            <button class="btn btn-success" type="button" value="Submit" onclick="submitForm(this);">
                Salvar
            </button>
        </div>
    </div>
</div>
