<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
        <div class="wrap">
            <label for="nome" class="form-control-label">Nome:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>
            <input type="text" class="form-control focus" name="nome" placeholder="Nome"
                value="{{@$esfera->nome}}">
            @if ($errors->has('nome'))
            <h6 class="heading text-danger">{{$errors->first('nome')}}</h6>
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
