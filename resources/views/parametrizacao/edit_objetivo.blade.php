@extends('dashboards.admin.layouts.admin-dash')
@section('title', 'Objetivos')

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
                    <li class="breadcrumb-item"><a href="#"><i class="fe fe-users mr-2 fs-14"></i>Objetivos</a></li>
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
                    <div class="card-header">
                        <div class="col-sm-12">
                            <span class="font-weight-bold"><i class="fe fe-database mr-1"></i>Edição de objetivos</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('form/objetivo/update')}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$objetivo[0]->id}}">
                                <div class="">
                                    <div class="form-group">
                                        <label for="nome" class="form-label">Objetivo</label>
                                        <input type="text" class="form-control" name="nome" id="nome_edit" value="{{$objetivo[0]->nome_objetivo}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="descricao" class="form-label">Descrição</label>
                                        <textarea class="form-control mb-4" rows="3" name="descricao" id="descricao_edit">{{$objetivo[0]->descricao_objetivo}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-indigo btn-sm" type="submit"> <i class="fe fe-save"></i> Salvar</button>
                                <a href="{{route('listar/objetivos')}}" class="btn btn-secondary btn-sm">
                                    <i class="fe fe-arrow-left-circle"></i> Voltar
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

@section('scripts')


<!-- {{-- update js --}} -->
<script>
    $(document).on('click', '.competenciaUpdate', function() {
        var _this = $(this).parents('tr');
        $('#e_id').val(_this.find('.id').text());
        $('#nome_edit').val(_this.find('.nome').text());
        $('#descricao_edit').val(_this.find('.descricao').text());
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
