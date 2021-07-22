<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
        <div class="wrap">
            <label for="id_esfera" class="form-control-label">Esfera:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>
            <select name="id_esfera" class="form-control">
                <option value="" selected>Selecione uma opção</option>
                @foreach ($esferas as $esfera)
                <option value="{{$esfera->id}}"
                    {{(empty(old('id_esfera')) ? @$documentos->id_esfera : old('id_esfera')) == $esfera->id ? 'selected' : ''}}>
                    {{$esfera->nome}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('id_esfera'))
            <h6 class="heading text-danger">{{$errors->first('id_esfera')}}</h6>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
        <div class="wrap">
            <label for="categoria_id" class="form-control-label">Categorias:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>
            <select name="categoria_id[]" class="form-control" type="text" multiple="multiple" id="categoria-ajax" style="width: 100%">
                @if (!empty($documentos))
                    @foreach (@$documentos->categorias as $categoria)
                    <option value="{{$categoria->id}}" selected>{{$categoria->nome}}</option>
                    @endforeach
                @endif
               
            </select>

            @if ($errors->has('id_tipo_documento'))
            <h6 class="heading text-danger">{{$errors->first('id_tipo_documento')}}</h6>
            @endif
        </div>
    </div>
</div>

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
            <label for="id_instituicao" class="form-control-label">Instituição:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>
            <select name="id_instituicao" class="form-control">
                <option value="" selected>Selecione uma opção</option>
                @foreach ($instituicoes as $instituicao)
                <option value="{{$instituicao->id}}"
                    {{(empty(old('id_instituicao')) ? @$documentos->id_instituicao : old('id_instituicao')) == $instituicao->id ? 'selected' : ''}}>
                    {{$instituicao->nome}}
                </option>

                @endforeach
            </select>
            @if ($errors->has('id_instituicao'))
            <h6 class="heading text-danger">{{$errors->first('id_instituicao')}}</h6>
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
            <label for="id_situacao" class="form-control-label">Situação:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>
            <select name="id_situacao" class="form-control">
                <option value="" selected>Selecione uma opção</option>
                @foreach ($situacoes as $situacao)
                <option value="{{$situacao->id}}"
                    {{(empty(old('id_situacao')) ? @$documentos->id_situacao : old('id_situacao')) == $situacao->id ? 'selected' : ''}}>
                    {{$situacao->nome}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('id_situacao'))
            <h6 class="heading text-danger">{{$errors->first('id_situacao')}}</h6>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
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
