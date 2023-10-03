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

            <select class="form-control select" name="categoria_id[]" multiple="multiple">
                @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}" {{in_array($categoria->id, (empty(old('categoria_id')) ?
                    (empty($documentos) ? [] : array_column(@$documentos->categorias->toArray(), 'id')) 
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
    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
        <div class="wrap">
            <label for="grupo_id" class="form-control-label">Grupos:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>
            <select name="grupo_id[]" class="form-control select" multiple="multiple">
                @foreach ($grupos as $grupo)
                <option value="{{$grupo->id}}" {{in_array($grupo->id, (empty(old('grupo_id')) ?
                    (empty($documentos) ? ['1'] : array_column(@$documentos->grupos->toArray(), 'id')) 
                     : old('grupo_id'))) ? 
                    'selected' : ''}}>
                    {{$grupo->nome}}
                </option>
                @endforeach
            </select>

            @if ($errors->has('grupo_id'))
            <h6 class="heading text-danger">{{$errors->first('grupo_id')}}</h6>
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
            <label for="doe" class="form-control-label">Diário Eletrônico:
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
    <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
        <div class="wrap">
            <label for="tipo_documento" class="form-control-label">Tipo:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>
            <select name="tipo_documento" class="form-control" id="tipoDocumento">
                <option value="fisico" selected>
                    Fisico
                </option>
                <option value="online" {{(empty(old('tipo_documento')) ? @$documentos->links->fisico  : old('tipo_documento')) == 0 ? 'selected' : '' }}>
                    Online
                </option>
            </select>
            @if ($errors->has('tipo_documento'))
            <h6 class="heading text-danger">{{$errors->first('tipo_documento')}}</h6>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 mt-4 campoLink d-none">
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

    <div class="col-sm-12 col-md-6 col-lg-6 mt-4 campoArquivo">
        <div class="wrap">
            <label for="upload" class="form-control-label">Arquivo:
                <span class="text-danger" style="font-size: 14px;">*</span>
            </label>
            <input type="file" name="upload" placeholder="Escolha um arquivo" id="upload">
            @if ($errors->has('upload'))
            <h6 class="heading text-danger">{{$errors->first('upload')}}</h6>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
        <div class="wrap">
            <label for="link" class="form-control-label">Descrição:</label>
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
@section('js')
<script>
    $("body").on("change", "#tipoDocumento", function (e) {
        if ($(this).val() == 'fisico') {
            $("body").find(".campoLink").addClass('d-none');
            $("body").find(".campoArquivo").removeClass('d-none');
        }

        if ($(this).val() == 'online') {
            $("body").find(".campoLink").removeClass('d-none');
            $("body").find(".campoArquivo").addClass('d-none');
        }
    })

    if ($("#tipoDocumento").val() == 'fisico') {
        $("body").find(".campoLink").addClass('d-none');
        $("body").find(".campoArquivo").removeClass('d-none');
    }

    if ($("#tipoDocumento").val() == 'online') {
        $("body").find(".campoLink").removeClass('d-none');
        $("body").find(".campoArquivo").addClass('d-none');
    }


</script>
@endsection
