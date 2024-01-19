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
                <div class="card-header">
                    <div class="col-sm-12">
                        <span class="font-weight-bold"><i class="fe fe-database mr-1"></i>Competências vinculadas a cargo de {{$resultado[0]->nome_cargo}}</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm table-striped table-bordered card-table table-vcenter text-nowrap">

                            <tbody>
                                <tr class="small">
                                    <td>Título da função</td>
                                    <td>{{$resultado[0]->nome_cargo}}</td>
                                </tr>

                                <tr class="small">
                                    <td>Grupo funcional</td>
                                    <td>{{ $resultado[0]->grupo_funcional}}</td>
                                </tr>
                                <tr class="small">
                                    <td>Departamento / Área de integração</td>
                                    <td>{{ $resultado[0]->dep}}</td>
                                </tr>
                                <tr class="small">
                                    <td>Local de trabalho</td>
                                    <td>{{ $resultado[0]->local}}</td>
                                </tr>
                                <tr class="small">
                                    <td>Reporte hierárquico</td>
                                    <td>{{ $resultado[0]->reporte}}</td>
                                </tr>


                                <tr class="small">
                                    <td class="fw-bolder fs-12"><br></td>
                                    <td class="fw-bolder fs-12"><br></td>

                                </tr>

                                <tr class="small">
                                    <td>Excel</td>
                                    <td>{{ $resultado[0]->excel}}</td>
                                </tr>
                                <tr class="small">
                                    <td>Word</td>
                                    <td>{{ $resultado[0]->word}}</td>
                                </tr>
                                <tr class="small">
                                    <td>Powerpoint</td>
                                    <td>{{ $resultado[0]->powerpoint}}</td>
                                </tr>
                                <tr class="small">
                                    <td>Access</td>
                                    <td>{{ $resultado[0]->access}}</td>
                                </tr>

                                <tr class="small">
                                    <td class="fw-bolder fs-12"><br></td>
                                    <td class="fw-bolder fs-12"><br></td>
                                </tr>
                                <tr class="small">
                                    <td>Lista de competências</td>
                                    <td>
                                        @foreach ($conjuntoCompetencias as $items)
                                        <ul>
                                            <li> {{$items->tipo_competencia}}</li>
                                        </ul>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>



                </div>
                <div class="card-footer">
                    <a href="{{route('listar/desempenhos')}}" class="btn btn-info btn-sm float-right"><i class="fe fe-arrow-left-circle mr-1"></i> Voltar </a>
                </div>

            </div>

        </div>
    </div>
    <!-- /Row -->

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
