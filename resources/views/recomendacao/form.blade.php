<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
        <div class="wrap">
            <label for="achado" class="form-control-label">Achados:</label>
            <textarea class="form-control" name="achado" id="achado" cols="30" rows="5">{{(empty(old('achado')) ? @$recomendacao->achado : old('achado')) }}</textarea>
            @if ($errors->has('achado'))
            <h6 class="heading text-danger">{{$errors->first('achado')}}</h6>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
        <div class="wrap">
            <label for="recomendacao" class="form-control-label">Recomendação:</label>
            <textarea class="form-control" name="recomendacao" cols="30" rows="5">{{(empty(old('recomendacao')) ? @$recomendacao->recomendacao : old('recomendacao'))}}</textarea>
            @if ($errors->has('recomendacao'))
            <h6 class="heading text-danger">{{$errors->first('recomendacao')}}</h6>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
        <div class="wrap">
            <label for="base_legal" class="form-control-label">Base Legal:</label>
            <textarea class="form-control" name="base_legal" cols="30" rows="5">{{(empty(old('base_legal')) ? @$recomendacao->base_legal : old('base_legal')) }}</textarea>
            @if ($errors->has('base_legal'))
            <h6 class="heading text-danger">{{$errors->first('base_legal')}}</h6>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
        <div class="wrap">
            <label for="categoria_id" class="form-control-label">Categorias:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>

            <select class="form-control select" name="categoria_id[]" multiple="multiple">
                @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}" {{in_array($categoria->id, (empty(old('categoria_id')) ?
                    (empty($recomendacao) ? [] : array_column(@$recomendacao->categorias->toArray(), 'id')) 
                     : old('categoria_id'))) ? 
                    'selected' : ''}}>
                    {{$categoria->nome}}
                </option>
                @endforeach
            </select>

            @if ($errors->has('categoria_id'))
            <h6 class="heading text-danger">{{$errors->first('categoria_id')}}</h6>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
        <div class="wrap">
            <label for="link" class="form-control-label">Link:</label>
            <input type="text" class="form-control" name="link"
                value="{{(empty(old('link')) ? @$recomendacao->links->link  : old('link')) }}">
            @if ($errors->has('link'))
            <h6 class="heading text-danger">{{$errors->first('link')}}</h6>
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