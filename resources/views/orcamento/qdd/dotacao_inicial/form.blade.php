<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('orcamento.qdd.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-lg-3 ">
                            <div class="wrap">
                                <label for="id_funcional_programatica" class="form-control-label">
                                    Funcional Programática: <span class="text-danger">*</span>
                                </label>
                                <select name="id_funcional_programatica" class="form-control">
                                    <option value="">Selecioner uma opção</option>
                                    @foreach ($funcionalProgramatica as $programa)
                                        <option value="{{$programa->id}}">
                                            {{$programa->cd_funcional_programatica}} 
                                            - 
                                            {{$programa->ds_funcional_programatica}}
                                        </option>
                                    @endforeach
                                </select>
                                
                                @if ($errors->has('id_funcional_programatica'))
                                <h6 class="heading text-danger">{{$errors->first('id_funcional_programatica')}}</h6>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-3 col-lg-3 ">
                            <div class="wrap">
                                <label for="id_fonte" class="form-control-label">Fonte:
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="id_fonte" class="form-control">
                                    <option value="">Selecioner uma opção</option>
                                    @foreach ($fontes as $fonte)
                                        <option value="{{$fonte->id}}">{{$fonte->numero_fonte}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('id_fonte'))
                                <h6 class="heading text-danger">{{$errors->first('id_fonte')}}</h6>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-3 col-lg-3 ">
                            <div class="wrap">
                                <label for="id_despesa" class="form-control-label">Rubrica Orçamentária:
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="id_despesa" class="form-control">
                                    <option value="">Selecioner uma opção</option>
                                    @foreach ($despesas as $despesa)
                                        <option value="{{$despesa->id}}">
                                            {{$despesa->codigo_despesa}} - {{$despesa->descricao_despesa}}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('id_despesa'))
                                <h6 class="heading text-danger">{{$errors->first('id_despesa')}}</h6>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-3 col-lg-3 ">
                            <div class="wrap">
                                <label for="vl_qdd_inicial" class="form-control-label">Valor:
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control focus money" name="vl_qdd_inicial">
                                @if ($errors->has('vl_qdd_inicial'))
                                <h6 class="heading text-danger">{{$errors->first('vl_qdd_inicial')}}</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 stretched_card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="single-table">
                                        <div class="table-responsive">
                                            <table class="table text-center">
                                                <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Funcional Programática</th>
                                                    <th scope="col">Fonte</th>
                                                    <th scope="col">Rubrica Orçamentária</th>
                                                    <th scope="col">Valor</th>
                                                    <th scope="col">Cadastrado</th>
                                                    <th scope="col">Data</th>
                                                    <th scope="col">Remover</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>jone</td>
                                                    <td>09 / 07 / 2018</td>
                                                    <td>$150</td>
                                                    <td>$120</td>
                                                    <td>$120</td>
                                                    <td>
                                                        <button class="btn btn-danger"><i class="ti-trash"></i></button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>