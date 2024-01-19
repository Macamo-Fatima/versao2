@extends('dashboards.admin.layouts.admin-dash')
@section('title', 'Cargos')

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
                    <li class="breadcrumb-item"><a href="#"><i class="fe fe-users mr-2 fs-14"></i>Cargos</a></li>
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
                    <span class="font-weight-bold"><i class="fe fe-database mr-1"></i>Lista de cargos</span>
                    <div>
                        <a data-effect="effect-scale" data-toggle="modal" href="#modaldemo8" class="btn btn-info btn-sm modal-effect"><i class="fe fe-plus-circle mr-1"></i> Criar novo </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  text-nowrap  table-striped table-hover table-bordered table-sm" id="example2">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0"></th>
                                    <th class="wd-15p border-bottom-0">Cargo</th>
                                    <th class="wd-15p border-bottom-0">Grupo funcional</th>
                                    <th class="wd-15p border-bottom-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cargosList as $items )
                                <tr style="transition: none !important; transform: none !important;">
                                    <td class="id">{{ $items->id}}</td>
                                    <td class="nome">{{ $items->nome_cargo}}</td>
                                    <td class="descricao">{{ $items->grupo_funcional}}</td>
                                    <td>
                                        <div aria-label="Basic example" class="btn-group float-right" role="group">
                                            <a class="btn btn-primary btn-sm competenciaUpdate modal-effect" data-effect="effect-scale" data-toggle="modal" data-id="'.$items->id.'" data-target="#edit_competencia"> <i class="zmdi zmdi-edit"></i>&nbsp;Editar</a>
                                            {{-- <a href="{{ url('excluir/tipo/cargo/'.$items->id)}}" class="btn btn-secondary btn-sm" onclick="return confirm('Deseja excluir este cargo?')"><i class="zmdi zmdi-delete"></i>&nbsp;Excluir</a> --}}
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
                <h6 class="modal-title"> <i class="fe fe-plus-circle"></i> Cadastro de cargo</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('form/tipo/cargo/save')}}" method="POST" id="validate">
                @csrf
                <div class="modal-body">
                    <div class="">
                        <div class="form-group">
                            <label for="nome" class="form-label">Cargo</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o cargo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite o cargo'" required>
                        </div>
                        <div class="form-group">
                            <label for="grupo_funcional" class="form-label">Grupo funcional</label>
                            <input type="text" class="form-control" name="grupo_funcional" id="grupo_funcional" placeholder="Digite o grupo funcional" onfocus="this.placeholder=''" onblur="this.placeholder='Digite o grupo funcional'" required>
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
                <h6 class="modal-title"> <i class="fe fe-plus-circle"></i> Edição de cargo</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('form/tipo/cargo/update')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="e_id" value="">
                    <div class="">
                        <div class="form-group">
                            <label for="nome" class="form-label">Cargo</label>
                            <input type="text" class="form-control" name="nome" id="nome_edit">
                        </div>
                        <div class="form-group">
                            <label for="descricao" class="form-label">Grupo funcional</label>
                            <input type="text" class="form-control" name="grupo_funcional" id="descricao_edit" placeholder="Digite o grupo funcional">
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

<div class="p-4 bg-light border border-bottom-0">
    <div class="modal" id="delete_tecnico">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"><i class="fe fe-alert-triangle"></i> Alerta</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('cargo/edit/delete')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" class="e_id" value="">

                    <div class="modal-body">
                        <p>Você deseja excluir este cargo?</p>
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
