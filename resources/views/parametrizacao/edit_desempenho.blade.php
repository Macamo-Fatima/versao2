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
                        <span class="font-weight-bold"><i class="fe fe-database mr-1"></i>Avaliação de desempenho</span>
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{route('form/desempenho/update')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$dados[0]->id}}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label" for="cargo"><span class="small">Cargo</span> <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select select2" name="funcao" id="funcao" required>
                                            <option value="{{$dados[0]->cargo}}">{{$dados[0]->nome_cargo}}</option>
                                            @foreach ($cargosList as $service)
                                            <option value="{{$service->id}}" data-price="{{$service->grupo_funcional}}">{{$service->nome_cargo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label" for="departamento"><span class="small">Departamento</span> <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select select2" name="departamento" id="departamento_edit" required>
                                            <option value="{{$dados[0]->dep}}">{{$dados[0]->dep}}</option>
                                            @foreach ($departamentosList as $dept)
                                            <option value="{{$dept->nome_departamento}}">{{$dept->nome_departamento}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label" for="local"><span class="small">Local de trabalho</span> <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select select2" name="local" id="local_edit" required>
                                            <option value="{{$dados[0]->local}}">{{$dados[0]->local}}</option>
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
                                            <input type="text" class="form-control" value="{{$dados[0]->missao}}" name="missao" id="missao_edit" placeholder="Digite a missão" />
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label" for="reporte"><span class="small">Reporte hierárquico</span></label>
                                        <div>
                                            <input type="text" class="form-control" name="reporte" value="{{$dados[0]->reporte}}" id="reporte_edit" placeholder="Digite o reporte hierárquico" />
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="grupo"><span class="small">Grupo funcional</span></label>
                                        <div>
                                            <input type="text" class="form-control" value="{{$dados[0]->grupo_funcional}}" name="grupo" id="grupo" readonly />
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="form-label" for="competencia"><span class="small">Competências</span> <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select select2" name="competencia" id="competencia_edit" required>
                                            <option value="{{$dados[0]->competencia}}">{{$dados[0]->competencia}}</option>
                                            @foreach ($competenciasList as $competencia)
                                            <option value="{{$competencia->nome_competencia}}">{{$competencia->nome_competencia}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label" for="proficiencia"><span class="small">Nível de proeficiência</span> <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select select2" name="proeficiencia" id="proficiencia_edit" required>
                                            <option value="{{$dados[0]->proficiencia}}">
                                                @if($dados[0]->proficiencia == 1)
                                                Um
                                                @elseif($dados[0]->proficiencia == 2)
                                                Dois
                                                @elseif($dados[0]->proficiencia == 3)
                                                Três
                                                @elseif($dados[0]->proficiencia == 4)
                                                Quatro
                                                @else
                                                Cinco
                                                @endif
                                            </option>
                                            <option value="1">Um</option>
                                            <option value="2">Dois</option>
                                            <option value="3">Três</option>
                                            <option value="4">Quatro</option>
                                            <option value="5">Cinco</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <hr><span class="small font-weight-bold">Competências Informáticas</span>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label" for="word"><span class="small">MS Word</span> <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select select2" name="word" id="word_edit" required>
                                            <option value="{{$dados[0]->word}}">{{$dados[0]->word}}</option>
                                            <option value="Básico">Básico</option>
                                            <option value="Intermediário">Intermediário</option>
                                            <option value="Avançado">Avançado</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label" for="excel"><span class="small">MS Excel</span> <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select select2" name="excel" id="excel_edit" required>
                                            <option value="{{$dados[0]->excel}}">{{$dados[0]->excel}}</option>
                                            <option value="Básico">Básico</option>
                                            <option value="Intermediário">Intermediário</option>
                                            <option value="Avançado">Avançado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label" for="access"><span class="small">MS Access</span> <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select select2" name="access" id="access_edit" required>
                                            <option value="{{$dados[0]->access}}">{{$dados[0]->access}}</option>
                                            <option value="Básico">Básico</option>
                                            <option value="Intermediário">Intermediário</option>
                                            <option value="Avançado">Avançado</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label" for="powerpoint"><span class="small">MS Powerpoint</span> <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select select2" name="powerpoint" id="powerpoint_edit" required>
                                            <option value="{{$dados[0]->powerpoint}}">{{$dados[0]->powerpoint}}</option>
                                            <option value="Básico">Básico</option>
                                            <option value="Intermediário">Intermediário</option>
                                            <option value="Avançado">Avançado</option>
                                        </select>
                                    </div>
                                </div>


                            </div>




                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-indigo btn-sm" type="submit"> <i class="fe fe-save"></i> Salvar</button>
                            <a href="{{route('listar/desempenhos')}}" class="btn btn-secondary btn-sm" data-dismiss="modal" type="button">
                                <i class="fe fe-arrow-left-circle mr-1"></i> Fechar
                            </a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
    <!-- /Row -->

</div>
</div>

{{-- Modal para edicao --}}
<div class="modal" id="edit_competencia">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> <i class="fe fe-plus-circle"></i> Edição de competência</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


        </div>
    </div>
</div>



@section('scripts')
<!-- {{-- update js --}} -->
{{-- script para auto select de grupo funcional --}}
<script>
    $('#funcao').on('change', function() {
        var price = $(this).children('option:selected').data('price');
        $('#grupo').val(price);
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
