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
                    <li class="breadcrumb-item"><a href="#"><i class="fe fe-users mr-2 fs-14"></i>Atribuição de competências</a></li>
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
                    <span class="font-weight-bold"><i class="fe fe-database mr-1"></i>Atribuição de competências</span>
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
                                    <th class="wd-15p border-bottom-0">Grupo funcional</th>
                                    <th class="wd-15p border-bottom-0">Departamento</th>
                                    <th class="wd-15p border-bottom-0">missão</th>
                                    <th class="wd-15p border-bottom-0">Local de trabalho</th>
                                    <th class="wd-15p border-bottom-0">Reporte hierárquico</th>
                                    <th class="wd-15p border-bottom-0">MS Word</th>
                                    <th class="wd-15p border-bottom-0">MS Excel</th>
                                    <th class="wd-15p border-bottom-0">MS Access</th>
                                    <th class="wd-15p border-bottom-0">MS Powerpoint</th>
                                    <th class="wd-15p border-bottom-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dados as $items )
                                <tr style="transition: none !important; transform: none !important;">
                                    <td class="funcao">{{$items->nome_cargo}}</td>
                                    <td class="grupo">{{$items->grupo_funcional}}</td>
                                    <td class="dep">{{$items->dep}}</td>
                                    <td class="missao">{{$items->missao}}</td>
                                    <td class="local">{{$items->local}}</td>
                                    <td class="reporte">{{$items->reporte}}</td>
                                    <td class="word">{{$items->word}}</td>
                                    <td class="excel">{{$items->excel}}</td>
                                    <td class="access">{{$items->access}}</td>
                                    <td class="powerpoint">{{$items->powerpoint}}</td>
                                    <td>
                                        <div aria-label="Basic example" class="btn-group float-right" role="group">
                                            <a href="{{ url('form/desempenho/ver',['novo' => $items->novoId])}}" class="btn btn-info btn-sm"> <i class="zmdi zmdi-eye"></i>&nbsp;Ver</a>
                                            {{-- <a href="{{ url('form/desempenho/edit',['id_desempenho' => $items->id])}}" class="btn btn-primary btn-sm"> <i class="zmdi zmdi-edit"></i>&nbsp;Editar </a> --}}
                                            <a href="{{ url('form/desempenho/excluir',['id_desempenho' => $items->id, 'novoId' => $items->novoId])}}" class="btn btn-secondary btn-sm" onclick="return confirm('Deseja excluir esta atribuição de competências?')"><i class="zmdi zmdi-delete"></i>&nbsp;Excluir</a>

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
                <h6 class="modal-title"> <i class="fe fe-plus-circle"></i> Atribuição de competências</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('form/desempenho/save') }}" method="POST" id="validate">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="cargo"><span class="small">Cargo</span> <span class="text-danger">*</span></label>
                                <select class="form-control custom-select select2" name="funcao" id="funcao" required>
                                    <option value="">Seleciona cargo</option>
                                    @foreach ($cargosList as $service)
                                    <option value="{{$service->id}}" data-price="{{$service->grupo_funcional}}">{{$service->nome_cargo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="departamento"><span class="small">Departamento</span> <span class="text-danger">*</span></label>
                                <select class="form-control custom-select select2" name="departamento" id="departamento" required>
                                    <option value="">Seleciona departamento</option>
                                    @foreach ($departamentosList as $dept)
                                    <option value="{{$dept->nome_departamento}}">{{$dept->nome_departamento}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
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
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="missao"><span class="small">Missão</span> </label>
                                <div>
                                    <input type="text" class="form-control" name="missao" id="missao" placeholder="Digite a missão" onfocus="
                                     this.placeholder=''" onblur="this.placeholder='Digite a missão'" />

                                </div>

                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="reporte"><span class="small">Reporte hierárquico</span></label>
                                <div>
                                    <select class="form-control custom-select select2" name="reporte" id="reporte" required>
                                        <option value="">Seleciona reporte hierárquico</option>
                                        @foreach ($colaboradoresNomesList as $reporte)
                                        <option value="{{$reporte->nome_completo}}">{{$reporte->nome_completo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="grupo"><span class="small">Grupo funcional</span></label>
                                <div>
                                    <input type="text" class="form-control" name="grupo" id="grupo" readonly />
                                </div>

                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="novacompetencia" class="form-label"><span class="small">Competências</span></label>
                                <select name="competencias[]" id="competencias" multiple="multiple" onchange="addProficienciaFields()" class="select1">
                                    <option value="" disabled>Seleciona competências</option>
                                    @foreach ($competenciasList as $competencia)
                                    <option value="{{ $competencia->nome_competencia }}">{{ $competencia->nome_competencia }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="proficiencia"><span class="small">Nível de proficiência</span> <span class="text-danger">*</span></label>
                                <select class="form-control custom-select select2" name="proeficiencia" id="proficiencia" disabled>
                                    <option value="">Seleciona nível de proficiência</option>
                                    <option value="1">Um</option>
                                    <option value="2">Dois</option>
                                    <option value="3">Três</option>
                                    <option value="4">Quatro</option>
                                    <option value="5">Cinco</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="proficiencia_fields"></div>
                    <hr>
                    <span class="small font-weight-bold">Competências Informáticas</span>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label" for="word"><span class="small">MS Word</span> <span class="text-danger">*</span></label>
                                <select class="form-control custom-select select2" name="word" id="word" required>
                                    <option value="">Seleciona módulo</option>
                                    <option value="Básico">Básico</option>
                                    <option value="Intermediário">Intermediário</option>
                                    <option value="Avançado">Avançado</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label" for="excel"><span class="small">MS Excel</span> <span class="text-danger">*</span></label>
                                <select class="form-control custom-select select2" name="excel" id="excel" required>
                                    <option value="">Seleciona módulo</option>
                                    <option value="Básico">Básico</option>
                                    <option value="Intermediário">Intermediário</option>
                                    <option value="Avançado">Avançado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label" for="access"><span class="small">MS Access</span> <span class="text-danger">*</span></label>
                                <select class="form-control custom-select select2" name="access" id="access" required>
                                    <option value="">Seleciona módulo</option>
                                    <option value="Básico">Básico</option>
                                    <option value="Intermediário">Intermediário</option>
                                    <option value="Avançado">Avançado</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label" for="powerpoint"><span class="small">MS Powerpoint</span> <span class="text-danger">*</span></label>
                                <select class="form-control custom-select select2" name="powerpoint" id="powerpoint" required>
                                    <option value="">Seleciona módulo</option>
                                    <option value="Básico">Básico</option>
                                    <option value="Intermediário">Intermediário</option>
                                    <option value="Avançado">Avançado</option>

                                </select>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-indigo btn-sm" type="submit"><i class="fe fe-save"></i> Salvar</button>
                    <button class="btn btn-secondary btn-sm" data-dismiss="modal" type="button">
                        <i class="fe fe-x"></i> Fechar
                    </button>
                </div>
            </form>



        </div>
    </div>
</div>




@section('scripts')


<script>
    function addProficienciaFields() {
        $('#proficiencia_fields').empty(); // Limpa os campos existentes antes de adicionar novos

        $('#competencias option:selected').each(function() {
            var competencia = $(this).val();
            var html = '<div class="row">';
            html += '<div class="col-sm-8">';
            html += '<label class="form-label">' + competencia + '</label>';
            html += '</div>';
            html += '<div class="col-sm-4">';
            html += '<div class="form-group">';
            html += '<select class="form-control form-select" name="proficiencia_' + competencia + '" required>';
            html += '<option value="">Seleciona o nível</option>';
            html += '<option value="1">Um</option>';
            html += '<option value="2">Dois</option>';
            html += '<option value="3">Três</option>';
            html += '<option value="4">Quatro</option>';
            html += '<option value="5">Cinco</option>';
            html += '</select>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $('#proficiencia_fields').append(html);
        });
    }

</script>

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
