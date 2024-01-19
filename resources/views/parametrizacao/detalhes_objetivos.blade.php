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
                <div class="card-header">
                    <div class="col-sm-12">
                        <span class="font-weight-bold"><i class="fe fe-database mr-1"></i>
                            Objetivos vinculados @if($resultado[0]->sexo === 'Masculino')
                            ao colaborador
                            @else
                            a colaboradora
                            @endif
                            {{$resultado[0]->nome_completo}}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm table-striped table-bordered card-table table-vcenter text-nowrap">

                            <tbody>
                                <tr class="small">
                                    <td>Nome completo</td>
                                    <td>{{$resultado[0]->nome_completo}}</td>
                                </tr>
                                <tr class="small">
                                    <td>Data de nascimento</td>
                                    <td>{{ Carbon\Carbon::parse($resultado[0]->data_nascimento)->format('d-m-Y')}}</td>                                 
                                </tr>

                                <tr class="small">
                                    <td>Estado civil</td>
                                    <td>{{ $resultado[0]->estado_civil}}</td>
                                </tr>
                                <tr class="small">
                                    <td>Grupo funcional</td>
                                    <td>{{ $resultado[0]->grupo_funcional}}</td>
                                </tr>
                                <tr class="small">
                                    <td>Departamento / Área de integração</td>
                                    <td>{{ $resultado[0]->departamento}}</td>
                                </tr>
                                <tr class="small">
                                    <td>Local de trabalho</td>
                                    <td>{{ $resultado[0]->local_funcionario}}</td>
                                </tr>
                                <tr class="small">
                                    <td>Reporte hierárquico</td>
                                    <td>{{ $resultado[0]->reporte}}</td>
                                </tr>
                                <tr class="small">
                                    <td>Missão</td>
                                    <td>{{ $resultado[0]->missao_funcionario}}</td>
                                </tr>
                                <tr class="small">
                                    <td>Contato profissional</td>
                                    <td>{{ $resultado[0]->contato_prof}}</td>
                                </tr>

                                <tr class="small">
                                    <td>Email profissional</td>
                                    <td>{{ $resultado[0]->email_prof}}</td>
                                </tr>

                                <tr class="small">
                                    <td>Tipo contrato</td>
                                    <td>{{ $resultado[0]->tipo_contrato}}</td>
                                </tr>

                                <tr class="small">
                                    <td>Turno</td>
                                    <td>{{ $resultado[0]->turno}}</td>
                                </tr>


                                <tr class="small">
                                    <td class="fw-bolder fs-12"><br></td>
                                    <td class="fw-bolder fs-12"><br></td>

                                </tr>

                                <tr class="small">
                                    <td class="fw-bolder fs-12"><br></td>
                                    <td class="fw-bolder fs-12"><br></td>
                                </tr>
                                <tr class="small">
                                    <td>Lista de objetivos</td>
                                    <td>
                                        @foreach ($conjuntoObjetivos as $items)
                                        <ul>
                                            <li> {{$items->tipo_objetivo}}</li>
                                        </ul>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>



                </div>
                <div class="card-footer">
                    <a href="{{route('listar/atribuicoes')}}" class="btn btn-info btn-sm float-right"><i class="fe fe-arrow-left-circle mr-1"></i> Voltar </a>
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
@endsection

@endsection
