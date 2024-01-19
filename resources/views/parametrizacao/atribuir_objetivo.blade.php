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
                    <li class="breadcrumb-item"><a href="#"><i class="fe fe-users mr-2 fs-14"></i>Atribuição de objetivos</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">View</a></li>
                </ol>
            </div>
            <div class="page-rightheader">
                {{-- <div class="btn btn-list">
                    <a data-effect="effect-scale" data-toggle="modal" href="#modaldemo8" class="btn btn-info btn-sm modal-effect"><i class="fe fe-plus-circle mr-1"></i> Criar nova </a>
                    <a href="{{route('admin/grelha/usuario')}}" class="btn btn-danger btn-sm"><i class="fe fe-calendar mr-1"></i> Lista grelha </a>
                <a href="{{route('admin/listar/usuario')}}" class="btn btn-warning btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
            </div> --}}
        </div>
    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">
        <span id="message_error"></span>
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold"><i class="fe fe-database mr-1"></i>Atribuição de objetivos</span>
                    <div>
                        <a data-effect="effect-scale" data-toggle="modal" href="#modaldemo8" class="btn btn-info btn-sm modal-effect"><i class="fe fe-plus-circle mr-1"></i> Criar nova </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  text-nowrap  table-striped table-hover table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Cargo</th>
                                    <th class="wd-15p border-bottom-0">Colaborador</th>
                                    <th class="wd-15p border-bottom-0">Grupo funcional</th>
                                    <th class="wd-15p border-bottom-0">missão</th>
                                    <th class="wd-15p border-bottom-0">Local de trabalho</th>
                                    <th class="wd-15p border-bottom-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dados as $items )
                                <tr style="transition: none !important; transform: none !important;">
                                    <td class="funcao">{{$items->nome_cargo}}</td>
                                    <td class="grupo">{{$items->nome_funcionario}}</td>
                                    <td class="grupo">{{$items->grupo_funcional}}</td>
                                    <td class="missao">{{$items->missao_funcionario}}</td>
                                    <td class="local">{{$items->local_funcionario}}</td>
                                    <td>
                                        <div aria-label="Basic example" class="btn-group float-right" role="group">
                                            <a href="{{ url('form/atribuicao/ver',['nome' => $items->nome_funcionario, 'id_cargo' => $items->cargo_funcionario])}}" class="btn btn-info btn-sm"> <i class="zmdi zmdi-eye"></i>&nbsp;Ver</a>
                                            {{-- <a href="{{ url('form/atribuicao/edit',['id_desempenho' => $items->id])}}" class="btn btn-primary btn-sm"> <i class="zmdi zmdi-edit"></i>&nbsp;Editar</a> --}}
                                            <a href="{{ url('form/atribuicao/excluir',['id_desempenho' => $items->id])}}" class="btn btn-secondary btn-sm" onclick="return confirm('Deseja excluir esta avaliação?')"><i class="zmdi zmdi-delete"></i>&nbsp;Excluir</a>
                                        </div>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Row -->

</div>
</div>
{{-- Modal para cadastro --}}
<div class="modal" id="modaldemo8">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> <i class="fe fe-plus-circle"></i> Atribuição de objetivo</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('form/atribuicao/save')}}" method="POST" id="validate">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="cargo"><span class="small">Colaborador</span> <span class="text-danger">*</span></label>
                                <select class="form-control custom-select select2" name="funcao" id="funcao" required>
                                    <option value="">Seleciona colaborador</option>
                                    @foreach ($funcionariosList as $service)
                                    <option value="{{$service->nome_completo}}" data-price="{{$service->categoria}}" data-price1="{{$service->funcao}}">{{$service->nome_completo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="local"><span class="small">Local de trabalho</span> <span class="text-danger">*</span></label>
                                <select class="form-control custom-select select2" name="local" id="local" required>
                                    <option value="">Seleciona local de trabalho</option>
                                    @foreach ($locaisList as $local)
                                    <option value="{{$local->nome_local}}">{{$local->nome_local}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="missao"><span class="small">Missão</span> </label>
                                <div>
                                    <input type="text" class="form-control" name="missao" id="missao" placeholder="Digite a missão" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Digite a missão'" />

                                </div>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="grupo"><span class="small">Grupo funcional</span></label>
                                <div>
                                    <input type="text" class="form-control" name="grupo" id="grupo" readonly />
                                </div>

                            </div>
                        </div>

                    </div>
                    <input type="hidden" class="form-control" name="cargo" id="cargo" />


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="novacompetencia" class="form-label"><span class="small">Objectivos</span></label>
                                <select name="objetivos[]" id="objetivos" multiple="multiple" onchange="console.log($(this).children(':selected').length)" class="select1">
                                    <option value="" disabled>Seleciona objectivos</option>
                                    @foreach ($objetivosList as $objetivo)
                                    <option value="{{$objetivo->nome_objetivo}}">{{$objetivo->nome_objetivo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-indigo btn-sm" type="submit"> <i class="fe fe-save"></i> Salvar</button>
                    <button class="btn btn-secondary btn-sm" data-dismiss="modal" type="button">
                        <i class="fe fe-x"></i> Fechar
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>





@section('scripts')
<!-- {{-- update js --}} -->
<script>
    $(document).on('click', '.competenciaUpdate', function() {
        var _this = $(this).parents('tr');
        $('#e_id').val(_this.find('.id').text());
        $('#missao_edit').val(_this.find('.missao').text());
        $('#reporte_edit').val(_this.find('.reporte').text());
        var funcao = (_this.find(".funcao").text());
        var _option = '<option selected value="' + funcao + '">' + _this.find('.funcao').text() + '</option>'
        $(_option).appendTo("#funcao_edit");

        var dep = (_this.find(".dep").text());
        var _option = '<option selected value="' + dep + '">' + _this.find('.dep').text() + '</option>'
        $(_option).appendTo("#departamento_edit");

        var local = (_this.find(".local").text());
        var _option = '<option selected value="' + local + '">' + _this.find('.local').text() + '</option>'
        $(_option).appendTo("#local_edit");

        var competencia = (_this.find(".competencia").text());
        var _option = '<option selected value="' + competencia + '">' + _this.find('.competencia').text() + '</option>'
        $(_option).appendTo("#competencia_edit");

        var proeficiencia = (_this.find(".proeficiencia").text());
        var _option = '<option selected value="' + proeficiencia + '">' + _this.find('.proeficiencia').text() + '</option>'
        $(_option).appendTo("#proeficiencia_edit");

        var word = (_this.find(".word").text());
        var _option = '<option selected value="' + word + '">' + _this.find('.word').text() + '</option>'
        $(_option).appendTo("#word_edit");

        var excel = (_this.find(".excel").text());
        var _option = '<option selected value="' + excel + '">' + _this.find('.excel').text() + '</option>'
        $(_option).appendTo("#excel_edit");

        var access = (_this.find(".access").text());
        var _option = '<option selected value="' + access + '">' + _this.find('.access').text() + '</option>'
        $(_option).appendTo("#access_edit");

        var powerpoint = (_this.find(".powerpoint").text());
        var _option = '<option selected value="' + powerpoint + '">' + _this.find('.powerpoint').text() + '</option>'
        $(_option).appendTo("#powerpoint_edit");



    });

</script>

{{-- script para auto select de grupo funcional --}}
<script>
    $('#funcao').on('change', function() {
        var price = $(this).children('option:selected').data('price');
        $('#grupo').val(price);
        var price1 = $(this).children('option:selected').data('price1');
        $('#cargo').val(price1);
    });

</script>


<!-- alert blink text -->
<script>
    function blink_text() {
        $('#message_error').fadeOut(700);
        $('#message_error').fadeIn(700);
    }
    setInterval(blink_text, 1000);

</script>
<!-- script validate form -->
<script>
    $('#validate').validate({
        reles: {
            'nome': {
                required: true
                , minlength: 3

            , }
            , 'grupo_funcional': {
                required: true
            , }
            , 'department[]': {
                required: true
            , }
        , }
        , messages: {
            'nome': {
                required: "Campo requerido*"
                , minlength: "O cargo consiste em pelo menos 3 (três) letras"

            }
            , 'grupo_funcional': "Campo requerido*"
            , 'department[]': "Please input file*"
        , }
    , });

</script>


@endsection

@endsection
