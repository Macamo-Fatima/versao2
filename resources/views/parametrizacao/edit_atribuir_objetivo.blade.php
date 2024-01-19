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
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Edição</a></li>
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
                        <span class="font-weight-bold"><i class="fe fe-database mr-1"></i>Edição de atribuição de objetivos</span>
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{route('form/atribuicao/update')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$dados[0]->id}}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label" for="cargo"><span class="small">Cargo</span> <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select select2" name="funcao" id="funcao" required>
                                            <option value="{{$dados[0]->cargo_funcionario}}">{{$dados[0]->nome_cargo}}</option>
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
                                            <option value="{{$dados[0]->dep_funcionario}}">{{$dados[0]->dep_funcionario}}</option>
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
                                            <option value="{{$dados[0]->local_funcionario}}">{{$dados[0]->local_funcionario}}</option>
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
                                            <input type="text" class="form-control" value="{{$dados[0]->missao_funcionario}}" name="missao" id="missao_edit" placeholder="Digite a missão" />
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label" for="reporte"><span class="small">Reporte hierárquico</span></label>
                                        <div>
                                            <input type="text" class="form-control" name="reporte" value="{{$dados[0]->reporte_funcionario}}" id="reporte_edit" placeholder="Digite o reporte hierárquico" />
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
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label" for="competencia"><span class="small">Objetivos</span> <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select select2" name="objetivo" id="objetivo_edit" required>
                                            <option value="{{$dados[0]->objetivo_atribuicao}}">{{$dados[0]->objetivo_atribuicao}}</option>
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
                            <a href="{{route('listar/atribuicoes')}}" class="btn btn-secondary btn-sm" data-dismiss="modal" type="button">
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
