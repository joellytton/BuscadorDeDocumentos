<div class="row">
    <div class="col-sm-12 col-md-4 col-lg-4 mt-4">
        <div class="wrap">
            <label for="cd_funcional_programatica" class="form-control-label">Código:
                <span class="text-danger" style="font-size: 14px;">
                    <i class="fa fa-info-circle"></i> (4 dígitos)
                </span>
            </label>
            <input type="text" class="form-control focus" name="cd_funcional_programatica" placeholder="Código"
                maxlength="4"
                value="{{empty(old('cd_funcional_programatica')) ? @$funcionalProgramatica->cd_funcional_programatica : old('cd_funcional_programatica')}}">
            @if ($errors->has('cd_funcional_programatica'))
            <h6 class="heading text-danger">{{$errors->first('cd_funcional_programatica')}}</h6>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4 mt-4">
        <div class="wrap">
            <label for="ds_funcional_programatica" class="form-control-label">Descrição:
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control focus" name="ds_funcional_programatica" placeholder="Descrição"
                value="{{empty(old('ds_funcional_programatica')) ? @$funcionalProgramatica->ds_funcional_programatica : old('ds_funcional_programatica')}}">
            @if ($errors->has('ds_funcional_programatica'))
            <h6 class="heading text-danger">{{$errors->first('ds_funcional_programatica')}}</h6>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4 mt-4">
        <div class="wrap">
            <label for="ano_funcional_programatica" class="form-control-label">Ano: <span class="text-danger">*</span>
            </label>
            <select name="ano_funcional_programatica" class="form-control">
                <option value="">Selecione uma opção</option>
                @php
                echo retornaAnosSelect(empty(old('ano_funcional_programatica')) ?
                @$funcionalProgramatica->ano_funcional_programatica : old('ano_funcional_programatica'));
                @endphp
            </select>
            @if ($errors->has('ano_funcional_programatica'))
            <h6 class="heading text-danger">{{$errors->first('ano_funcional_programatica')}}</h6>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-4 col-lg-4 mt-4">
        <div class="wrap">
            <label for="id_funcao" class="form-control-label">Função: <span class="text-danger">*</span></label>
            <select name="id_funcao" class="form-control">
                <option value="">Selecione uma opção</option>
                @foreach ($funcionalFuncao as $funcao)
                <option value="{{$funcao->id}}"
                    {{(empty(old('id_funcao')) ? @$funcionalProgramatica->id_funcao : old('id_funcao') ) == $funcao->id ? 'selected' : ''}}>
                    {{$funcao->cd_funcao}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('id_funcao'))
            <h6 class="heading text-danger">{{$errors->first('id_funcao')}}</h6>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4 mt-4">
        <div class="wrap">
            <label for="id_subfuncao" class="form-control-label">Subfunção: <span class="text-danger">*</span></label>
            <select name="id_subfuncao" class="form-control">
                <option value="">Selecione uma opção</option>
                @foreach ($funcionalSubFuncao as $subFuncao)
                <option value="{{$subFuncao->id}}"
                    {{(empty(old('id_subfuncao')) ? @$funcionalProgramatica->id_subfuncao : old('id_subfuncao') ) == $subFuncao->id ? 'selected' : ''}}>
                    {{$subFuncao->cd_subfuncao}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('id_subfuncao'))
            <h6 class="heading text-danger">{{$errors->first('id_subfuncao')}}</h6>
            @endif
        </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4 mt-4">
        <div class="wrap">
            <label for="id_programa" class="form-control-label">Programa: <span class="text-danger">*</span></label>
            <select name="id_programa" class="form-control">
                <option value="">Selecione uma opção</option>
                @foreach ($funcionalPrograma as $programa)
                <option value="{{$programa->id}}"
                    {{(empty(old('id_programa')) ? @$funcionalProgramatica->id_programa : old('id_programa') ) == $programa->id ? 'selected' : ''}}>
                    {{$programa->cd_programa}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('id_programa'))
            <h6 class="heading text-danger">{{$errors->first('id_programa')}}</h6>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 text-center mt-5">
        <div class="wrap mt-2">
            <button class="btn btn-success" type="button" value="Submit" onclick="submitForm(this);">
                Salvar
            </button>
        </div>
    </div>
</div>
