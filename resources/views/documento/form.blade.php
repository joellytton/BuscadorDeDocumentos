<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
        <div class="wrap">
            <label for="id_tipo_documento" class="form-control-label">Tipo:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>
            <select name="id_tipo_documento" class="form-control">
                <option value="" selected>Selecione uma opção</option>
                @foreach ($tipoDocumentos as $documento)
                <option value="{{$documento->id}}"
                    {{(empty(old('id_tipo_documento')) ? @$documentos->id_tipo_documento : old('id_tipo_documento')) == $documento->id ? 'selected' : ''}}>
                    {{$documento->nome}}
                </option>
                @endforeach
            </select>

            @if ($errors->has('id_tipo_documento'))
            <h6 class="heading text-danger">{{$errors->first('id_tipo_documento')}}</h6>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
        <div class="wrap">
            <label for="id_emitente" class="form-control-label">Emitente:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>
            <select name="id_emitente" class="form-control">
                <option value="" selected>Selecione uma opção</option>
                @foreach ($emitentes as $emitente)
                <option value="{{$emitente->id}}"
                    {{(empty(old('id_emitente')) ? @$documentos->id_emitente : old('id_emitente')) == $emitente->id ? 'selected' : ''}}>
                    {{$emitente->nome}}
                </option>

                @endforeach
            </select>
            @if ($errors->has('cd_funcao'))
            <h6 class="heading text-danger">{{$errors->first('cd_funcao')}}</h6>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-3 col-lg-3 mt-4">
        <div class="wrap">
            <label for="numero" class="form-control-label">Número:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>
            <input type="number" class="form-control" name="numero"
                value="{{empty(old('numero')) ? @$documentos->numero : old('numero')}}" min="1">
            @if ($errors->has('numero'))
            <h6 class="heading text-danger">{{$errors->first('numero')}}</h6>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3 mt-4">
        <div class="wrap">
            <label for="doe" class="form-control-label">DOE:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>
            <input type="text" class="form-control" name="doe"
                value="{{empty(old('doe')) ? @$documentos->doe : old('doe')}}">
            @if ($errors->has('doe'))
            <h6 class="heading text-danger">{{$errors->first('doe')}}</h6>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3 mt-4">
        <div class="wrap">
            <label for="data" class="form-control-label">Data:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>
            <input type="date" class="form-control" name="data"
                value="{{(empty(old('data')) ? (!empty($documentos) ? @$documentos->data : '') : old('data')) }}">
            @if ($errors->has('data'))
            <h6 class="heading text-danger">{{$errors->first('data')}}</h6>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3 mt-4">
        <div class="wrap">
            <label for="link" class="form-control-label">Link:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>
            <input type="text" class="form-control" name="link"
                value="{{(empty(old('link')) ? @$documentos->links->link  : old('link')) }}">
            @if ($errors->has('link'))
            <h6 class="heading text-danger">{{$errors->first('link')}}</h6>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
        <div class="wrap">
            <textarea class="form-control" name="descricao" cols="30"
                rows="5">{{(empty(old('descricao')) ? @$documentos->descricao : old('descricao')) }}</textarea>
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
