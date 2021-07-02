<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
        <div class="wrap">
            <label for="funcao" class="form-control-label">Qdd:
                <span class="text-danger">*</span>
            </label>
            <input type="number" class="form-control focus" name="ano_qdd" value="{{@$qdd->ano_qdd}}">
            @if ($errors->has('ano_qdd'))
            <h6 class="heading text-danger">{{$errors->first('ano_qdd')}}</h6>
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
