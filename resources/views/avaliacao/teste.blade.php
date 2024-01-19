@extends('dashboards.admin.layouts.admin-dash')
@section('title', 'Avaliação')

@section('content')

<div class="app-content main-content">
    <div class="side-app">

        <!--app header-->
        @include('dashboards.admin.layouts.navbar')
        <!--/app header-->

        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-0">Painel</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fe fe-users mr-2 fs-14"></i>Avaliação de desempenho</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Cadastro</a></li>
                </ol>
            </div>
            <div class="page-rightheader">
                {{-- <div class="btn btn-list">
                    <a href="{{route('admin/novo/usuario')}}" class="btn btn-blue btn-sm"><i class="mdi mdi-account-plus mr-1"></i> Criar novo </a>
                <a href="{{route('admin/grelha/usuario')}}" class="btn btn-red btn-sm"><i class="mdi mdi-apps mr-1"></i> Lista grelha </a>
                <a href="{{route('admin/listar/usuario')}}" class="btn btn-warning btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
                <a href="{{route('admin/logs/usuario')}}" class="btn btn-dark btn-sm"><i class="fe fe-align-justify mr-1"></i> Logs de usuários </a>
            </div> --}}
        </div>
    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <span class="font-weight-bold"><i class="fe fe-plus-circle mr-1"></i>Cadastro de avaliação</span>
                            &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <a href="{{route('workers/avaliacao')}}" class="btn btn-blue  btn-sm"><i class="fe fe-arrow-left-circle mr-1"></i> Voltar</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{route('form/avaliacao/save')}}" method="POST" id="form">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="form-label"><span class="small">Tipo de avaliação</span></label>
                                <select class="form-control select2" name="avaliacao" id="avaliacao" required>
                                    <option value="">-- Tipo de avaliação --</option>
                                    <option value="Semestral">Semestral</option>
                                    <option value="Anual">Anual</option>
                                </select>

                            </div>

                            <div class="col-md-3">
                                <label class="form-label" for="data-realizacao"><span class="small">Data da realização</span></label>
                                <input type="datetime-local" class="form-control" name="data_realizacao" id="data_realizacao" placeholder="Seleciona a data" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Seleciona a data'" required />

                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><span class="small ">Funcionário</span></label>
                                <input type="text" id="funcionario" name="funcionario" class="form-control" value="{{$funcionariosList[0]->nome_completo}}" readonly>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="example-email"><span class="small">Cargo</span></label>
                                <input type="text" id="cargo" name="cargo" class="form-control" value="{{$funcionariosList[0]->nome_cargo}}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <form action="" method="post">
                                            @csrf
                                            <label class="form-label"><span class="small">Competências</span></label>
                                            <select class="form-control select2" name="funcionario_competencias" id="funcionario_competencias" required>
                                                <option value="">-- Seleciona o cargo para busca de competências --</option>
                                                @foreach($funcionariosList as $cargo)
                                                <option value="{{ $cargo->funcao }}">{{ $cargo->nome_cargo }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-primary btn-sm mt-2"> Buscar</button>
                                        </form>
                                    </div>

                                    <div class="col-md-6">
                                        <form action="" method="post">
                                            <label class="form-label"><span class="small">Objetivos</span></label>
                                            <select class="form-control select2" name="avaliacao" id="avaliacao3" required>
                                                <option value="">-- Seleciona o cargo para busca de objetivos --</option>
                                                <option value="Semestral">Semestral</option>
                                                <option value="Anual">Anual</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary btn-sm mt-2"> Buscar</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover card-table table-vcenter text-nowrap table-sm">
                                <tbody>
                                    <tr class="small">
                                        <td><span class="small">Inspirar</span></td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="inspirar" value="1">
                                                <span class="custom-control-label">1</span>
                                            </label>
                                        </td>

                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="inspirar" value="2">
                                                <span class="custom-control-label">2</span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="inspirar" value="3">
                                                <span class="custom-control-label">3</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="inspirar" value="4">
                                                <span class="custom-control-label">4</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="inspirar" value="5">
                                                <span class="custom-control-label">5</span>
                                            </label>

                                        </td>

                                    </tr>
                                    <tr class="small">
                                        <td><span class="small">Networking</span></td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="networking" value="1">
                                                <span class="custom-control-label">1</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="networking" value="2">
                                                <span class="custom-control-label">2</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="networking" value="3">
                                                <span class="custom-control-label">3</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="networking" value="4">
                                                <span class="custom-control-label">4</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="networking" value="5">
                                                <span class="custom-control-label">5</span>
                                            </label>

                                        </td>

                                    </tr>
                                    <tr class="small">
                                        <td><span class="small">Cooperar</span></td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="cooperar" value="1">
                                                <span class="custom-control-label">1</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="cooperar" value="2">
                                                <span class="custom-control-label">2</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="cooperar" value="3">
                                                <span class="custom-control-label">3</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="cooperar" value="4">
                                                <span class="custom-control-label">4</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="cooperar" value="5">
                                                <span class="custom-control-label">5</span>
                                            </label>

                                        </td>

                                    </tr>
                                    <tr class="small">
                                        <td><span class="small">Envolver e Integrar</span></td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="envolver" value="1">
                                                <span class="custom-control-label">1</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="envolver" value="2">
                                                <span class="custom-control-label">2</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="envolver" value="3">
                                                <span class="custom-control-label">3</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="envolver" value="4">
                                                <span class="custom-control-label">4</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="envolver" value="5">
                                                <span class="custom-control-label">5</span>
                                            </label>

                                        </td>

                                    </tr>
                                    <tr class="small">
                                        <td><span class="small">Autonomia</span></td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="autonomia" value="1">
                                                <span class="custom-control-label">1</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="autonomia" value="2">
                                                <span class="custom-control-label">2</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="autonomia" value="3">
                                                <span class="custom-control-label">3</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="autonomia" value="4">
                                                <span class="custom-control-label">4</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="autonomia" value="5">
                                                <span class="custom-control-label">5</span>
                                            </label>

                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover card-table table-vcenter text-nowrap table-sm">
                                <tbody>
                                    <tr class="small">
                                        <td><span class="small">Garantir a disponibilização da informação financeira devidamente reconciliado à data útil

                                            </span></td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="disponibilidade_info" value="1">
                                                <span class="custom-control-label">1</span>
                                            </label>
                                        </td>

                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="disponibilidade_info" value="2">
                                                <span class="custom-control-label">2</span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="disponibilidade_info" value="3">
                                                <span class="custom-control-label">3</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="disponibilidade_info" value="4">
                                                <span class="custom-control-label">4</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="disponibilidade_info" value="5">
                                                <span class="custom-control-label">5</span>
                                            </label>

                                        </td>

                                    </tr>
                                    <tr class="small">
                                        <td>
                                            <span class="small">Contribuir para expansão do investimentos em infraestrutura no país</span>
                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="cumprimento_legislacao" value="1">
                                                <span class="custom-control-label">1</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="cumprimento_legislacao" value="2">
                                                <span class="custom-control-label">2</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="cumprimento_legislacao" value="3">
                                                <span class="custom-control-label">3</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="cumprimento_legislacao" value="4">
                                                <span class="custom-control-label">4</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="cumprimento_legislacao" value="5">
                                                <span class="custom-control-label">5</span>
                                            </label>

                                        </td>

                                    </tr>
                                    <tr class="small">
                                        <td>
                                            <span class="small">Garantir a efectividade do sistema de controlo interno</span>
                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="garantir_efetividade" value="1">
                                                <span class="custom-control-label">1</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="garantir_efetividade" value="2">
                                                <span class="custom-control-label">2</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="garantir_efetividade" value="3">
                                                <span class="custom-control-label">3</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="garantir_efetividade" value="4">
                                                <span class="custom-control-label">4</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="garantir_efetividade" value="5">
                                                <span class="custom-control-label">5</span>
                                            </label>

                                        </td>

                                    </tr>
                                    <tr class="small">
                                        <td>
                                            <span class="small">Aumentar níveis de liquidez do Banco</span>
                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="niveis_liquidez" value="1">

                                                <span class="custom-control-label">1</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="niveis_liquidez" value="2">
                                                <span class="custom-control-label">2</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="niveis_liquidez" value="3">
                                                <span class="custom-control-label">3</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="niveis_liquidez" value="4">
                                                <span class="custom-control-label">4</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="niveis_liquidez" value="5">
                                                <span class="custom-control-label">5</span>
                                            </label>

                                        </td>

                                    </tr>
                                    <tr class="small">
                                        <td>
                                            <span class="small">Assessorar na estruturação e mobilização de recursos para projectos infraestruturantes</span>
                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="assessorar" value="1">

                                                <span class="custom-control-label">1</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="assessorar" value="2">
                                                <span class="custom-control-label">2</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="assessorar" value="3">
                                                <span class="custom-control-label">3</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="assessorar" value="4">
                                                <span class="custom-control-label">4</span>
                                            </label>

                                        </td>
                                        <td>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="assessorar" value="5">
                                                <span class="custom-control-label">5</span>
                                            </label>

                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="form-label"><span class="small">Ação de formação</span></label>
                                <textarea class="form-control" cols="2" rows="2" name="acao" id="acao" placeholder="Digite a ação necessária para melhoria do desempenho do colaborador" onfocus="
                            this.placeholder=''" onblur="this.placeholder='Digite a ação necessária para melhoria do desempenho do colaborador'"></textarea>

                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="data-realizacao"><span class="small">Recomendações do avaliador</span></label>
                                <textarea class="form-control" cols="2" rows="2" name="recomendacao" id="recomendacao" placeholder="Digite as recomendações do avaliador" onfocus="
                            this.placeholder=''" onblur="this.placeholder='Digite as recomendações do avaliador'"></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><span class="small ">Comentários do avaliado</span></label>
                                <textarea class="form-control" cols="2" rows="2" name="comentario" id="comentario" placeholder="Digite os comentários do avaliado" onfocus="
                            this.placeholder=''" onblur="this.placeholder='Digite os comentários do avaliado'"></textarea>
                            </div>
                        </div>


                        <div class="form-group mb-0 mt-4 row justify-content-end">
                            <div class="col-md-7">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-info float-right btn-sm mr-3"><i class="fe fe-save"></i>&nbsp;Salvar</button>
                                <a href="{{route('listar/avaliacoes')}}" class="btn btn-danger float-right btn-sm  mr-2"> <i class="fe fe-arrow-left-circle"></i> Voltar</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><span class="small">Distribuição dos funcionários por faixas etárias</span></div>
                </div>
                <div class="card-body">
                    <div class="morris-wrapper-demo" id="chart"></div>
                </div>
            </div>

        </div>
    </div>

  


    <!-- /Row -->

</div>
</div>

@section('scripts')
{{-- barColors: ["#705ec8", "#fb1c52"],
 gridTextSize: 11,
 hideHover: "auto",
 resize: true, --}}


<script>
    var data = @json($chartData); // Os dados passados do controlador

    new Morris.Bar({
        element: 'chart'
        , data: data
        , xkey: 'age_group'
        , ykeys: ['male', 'female', 'total']
        , gridTextSize: 11
        , hideHover: "auto"
        , resize: true
        , labels: ['Homens', 'Mulheres', 'Total']
        , barColors: ['#705ec8', '#fb1c52', '#999999']
        , stacked: false
    , });

</script>


<script>
    // select auto nome e grupo funcional// was not used no more
    $('#funcionario').on('change', function() {
        $('#cargo').val($(this).find(':selected').data('grupo_funcional'));
    });

</script>

{{-- script para auto select de cargo --}}
<script>
    $('#funcao').on('change', function() {
        var price = $(this).children('option:selected').data('price');
        $('#grupo').val(price);
    });

</script>


<script type="text/javascript">
    $('#fotografia').change(function() {

        let reader = new FileReader();

        reader.onload = (e) => {

            $('#preview-image').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

    });

</script>

<script type="text/javascript">
    config = {
        altInput: true
        , altFormat: "F j, Y"
        , dateFormat: "Y-m-d"
    , }

    flatpickr("input[type=datetime-local]", config);

</script>

<script>
    $('#form').parsley();

</script>



@endsection


@endsection
