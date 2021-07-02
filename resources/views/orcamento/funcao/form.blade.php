<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
        <div class="wrap">
            <label for="funcao" class="form-control-label">Função:
                <span class="text-danger" style="font-size: 14px;">
                    <i class="fa fa-info-circle"></i> (2 dígitos)
                </span>
            </label>
            <input type="text" class="form-control focus" name="cd_funcao" placeholder="Função"
                value="{{@$funcionalFuncao->cd_funcao}}" maxlength="2">
            @if ($errors->has('cd_funcao'))
            <h6 class="heading text-danger">{{$errors->first('cd_funcao')}}</h6>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 mt-5">
        <div class="wrap mt-2">
            <button class="btn btn-success" type="button" value="Submit" onclick="submitForm(this);" >
                Salvar
            </button>
        </div>
    </div>
</div>
