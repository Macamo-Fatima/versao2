@extends('dashboards.admin.layouts.admin-dash')
@section('title', 'Pesos')

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
                    <li class="breadcrumb-item"><a href="#"><i class="fe fe-users mr-2 fs-14"></i>Atribuição de pesos</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">View</a></li>
                </ol>
            </div>
            <div class="page-rightheader">

            </div>
        </div>
        <!--End Page header-->

        <!-- Row -->
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="font-weight-bold"><i class="fe fe-database mr-1"></i>Percentuais atribuidos a grupos funcionais </span>

                        <div>
                            <a data-effect="effect-scale" data-toggle="modal" href="#modaldemo8" class="btn btn-info btn-sm modal-effect"><i class="fe fe-plus-circle mr-1"></i> Nova atribuição </a>

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table  text-nowrap  table-striped table-hover table-bordered table-sm" id="example2">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0"></th>
                                        <th class="wd-15p border-bottom-0">Grupo funcional</th>
                                        <th class="wd-15p border-bottom-0">Peso das competências</th>
                                        <th class="wd-15p border-bottom-0">Peso dos objectivos</th>
                                        <th class="wd-15p border-bottom-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesosList as $items )
                                    <tr style="transition: none !important; transform: none !important;">
                                        <td class="id">{{ $items->id}}</td>
                                        <td class="grupo_funcional">{{ $items->grupo_funcional}}</td>
                                        <td class="small peso_competencias">{{ $items->peso_competencias}}</td>
                                        <td class="small peso_objetivos">{{ $items->peso_objetivos}}</td>
                                        <td>
                                            <div aria-label="Basic example" class="btn-group float-right" role="group">
                                                <a class="btn btn-primary btn-sm competenciaUpdate" data-toggle="modal" data-id="'.$items->id.'" data-target="#edit_competencia"> <i class="zmdi zmdi-edit"></i>&nbsp;Editar</a>
                                                <a class="btn btn-secondary btn-sm tecnicoDelete" data-effect="effect-scale" href="#" data-toggle="modal" data-target="#delete_tecnico"><i class="zmdi zmdi-delete"></i>&nbsp;Excluir</a>

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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> <i class="fe fe-plus-circle"></i> Atribuição de percentual</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('form/peso/save')}}" method="POST" id="validate">
                @csrf
                <div class="modal-body">
                    <div class="">
                        <div class="form-group">
                            <label for="nome" class="form-label">Grupo funcional</label>
                            <select class="form-control custom-select select2" name="grupo_funcional" id="grupo_funcional" required>
                                <option value="">Seleciona o grupo funcional</option>
                                @foreach ($gruposFuncionais as $grupo)
                                <option value="{{$grupo->grupo_funcional}}">{{$grupo->grupo_funcional}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="descricao" class="form-label">Peso das competências</label>
                                <select class="form-control custom-select select2" name="peso_competencias" id="peso_competencias" required>
                                    <option value="">Seleciona o peso</option>
                                    <option value="0">0</option>
                                    <option value="5">5</option>
                                    <option value="10">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="35">35</option>
                                    <option value="40">40</option>
                                    <option value="45">45</option>
                                    <option value="50">50</option>
                                    <option value="55">55</option>
                                    <option value="60">60</option>
                                    <option value="65">65</option>
                                    <option value="70">70</option>
                                    <option value="75">75</option>
                                    <option value="80">80</option>
                                    <option value="85">85</option>
                                    <option value="90">90</option>
                                    <option value="95">95</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="descricao" class="form-label">Peso dos objectivos</label>
                                <select class="form-control custom-select select2" name="peso_objetivos" id="peso_objetivos" required>
                                    <option value="">Seleciona o peso</option>
                                    <option value="0">0</option>
                                    <option value="5">5</option>
                                    <option value="10">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="35">35</option>
                                    <option value="40">40</option>
                                    <option value="45">45</option>
                                    <option value="50">50</option>
                                    <option value="55">55</option>
                                    <option value="60">60</option>
                                    <option value="65">65</option>
                                    <option value="70">70</option>
                                    <option value="75">75</option>
                                    <option value="80">80</option>
                                    <option value="85">85</option>
                                    <option value="90">90</option>
                                    <option value="95">95</option>
                                    <option value="100">100</option>
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
{{-- Modal para edicao --}}
<div class="modal" id="edit_competencia">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> <i class="fe fe-plus-circle"></i> Edição de percentual</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('form/peso/update')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="e_id" value="">
                    <div class="">
                        <div class="form-group">
                            <label for="nome" class="form-label">Grupo funcional</label>
                            <select class="form-control custom-select select2" name="grupo_funcional" id="grupo_funcional_edit" required>
                                @foreach ($cargosList as $grupo)
                                <option value="{{$grupo->grupo_funcional}}">{{$grupo->grupo_funcional}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="descricao" class="form-label">Peso das competências</label>
                                <select class="form-control custom-select select2" name="peso_competencias" id="peso_competencias_edit" required>
                                    <option value="0">0</option>
                                    <option value="5">5</option>
                                    <option value="10">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="35">35</option>
                                    <option value="40">40</option>
                                    <option value="45">45</option>
                                    <option value="50">50</option>
                                    <option value="55">55</option>
                                    <option value="60">60</option>
                                    <option value="65">65</option>
                                    <option value="70">70</option>
                                    <option value="75">75</option>
                                    <option value="80">80</option>
                                    <option value="85">85</option>
                                    <option value="90">90</option>
                                    <option value="95">95</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="descricao" class="form-label">Peso dos objectivos</label>
                                <select class="form-control custom-select select2" name="peso_objetivos" id="peso_objetivos_edit" required>
                                    <option value="0">0</option>
                                    <option value="5">5</option>
                                    <option value="10">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="35">35</option>
                                    <option value="40">40</option>
                                    <option value="45">45</option>
                                    <option value="50">50</option>
                                    <option value="55">55</option>
                                    <option value="60">60</option>
                                    <option value="65">65</option>
                                    <option value="70">70</option>
                                    <option value="75">75</option>
                                    <option value="80">80</option>
                                    <option value="85">85</option>
                                    <option value="90">90</option>
                                    <option value="95">95</option>
                                    <option value="100">100</option>
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


{{-- Delete Leave Modal  --}}

<div class="p-4 bg-light border border-bottom-0">
    <div class="modal" id="delete_tecnico">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"><i class="fe fe-alert-triangle"></i> Alerta</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>

                <form action="{{route('peso/edit/delete')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" class="e_id" value="">
                    <div class="modal-body">
                        <p>Você deseja excluir este registo?</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button class="btn btn-indigo btn-sm" type="submit"> <i class="fe fe-check-circle"></i> Sim</button> <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal"> <i class="fe fe-x-circle"></i> Não</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>




@section('scripts')
{{-- delete model --}}
<script>
    $(document).on('click', '.tecnicoDelete', function() {
        var _this = $(this).parents('tr');
        $('.e_id').val(_this.find('.id').text());
    });

</script>

<!-- {{-- update js --}} -->
<script>
    $(document).on('click', '.competenciaUpdate', function() {
        var _this = $(this).parents('tr');
        $('#e_id').val(_this.find('.id').text());

        var grupo_funcional = (_this.find(".grupo_funcional").text());
        var _option = '<option selected value="' + grupo_funcional + '">' + _this.find('.grupo_funcional').text() + '</option>'
        $(_option).appendTo("#grupo_funcional_edit");


        var peso_competencias = (_this.find(".peso_competencias").text());
        var _option = '<option selected value="' + peso_competencias + '">' + _this.find('.peso_competencias').text() + '</option>'
        $(_option).appendTo("#peso_competencias_edit");

        var peso_objetivos = (_this.find(".peso_objetivos").text());
        var _option = '<option selected value="' + peso_objetivos + '">' + _this.find('.peso_objetivos').text() + '</option>'
        $(_option).appendTo("#peso_objetivos_edit");

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
            , 'descricao': {
                required: true
            }

        , }
        , messages: {
            'nome': {
                required: "Campo requerido*"
                , minlength: "O cargo consiste em pelo menos 3 (três) letras"
            }
            , 'descricao': "Campo requerido*"


        , }
    , });

</script>


@endsection

@endsection
