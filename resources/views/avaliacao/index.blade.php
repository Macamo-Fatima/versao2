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
                    <li class="breadcrumb-item"><a href="#"><i class="fe fe-users mr-2 fs-14"></i>Avaliação</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)">View</a></li>
                </ol>
            </div>
            <div class="page-rightheader">
                {{-- <div class="btn btn-list">
                    <a href="{{route('nova/avaliacao')}}" class="btn btn-blue btn-sm"><i class="zmdi zmdi-assignment mr-1"></i>Nova </a>
                <a href="{{route('gridView/funcionarios')}}" class="btn btn-secondary btn-sm"><i class="mdi mdi-apps mr-1"></i> Lista grelha </a>
                <a href="{{route('listar/funcionarios')}}" class="btn btn-dark btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
            </div> --}}
        </div>
    </div>
    <!--End Page header-->


    <!-- Row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold"><i class="fe fe-database mr-1"></i>Avaliação de desempenho</span>
                    <div aria-label="Basic example" class="btn-group" role="group">
                        <a href="{{route('nova/avaliacao')}}" class="btn btn-blue btn-sm"><i class="zmdi zmdi-assignment mr-1"></i>Nova </a>
                        <a href="{{route('gridView/avaliacao')}}" class="btn btn-secondary btn-sm"><i class="mdi mdi-apps mr-1"></i> Lista grelha </a>
                       
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  text-nowrap  table-striped table-hover table-bordered" id="example2">
                            <thead>
                                <tr style="transition: none !important; transform: none !important;">
                                    <th class="wd-15p border-bottom-0">Nome completo</th>
                                    <th class="wd-15p border-bottom-0">Departamento</th>
                                    <th class="wd-15p border-bottom-0">Função</th>
                                    <th class="wd-15p border-bottom-0">Tipo de avaliação</th>
                                    <th class="wd-15p border-bottom-0">Data da realização</th>
                                    <th class="wd-15p border-bottom-0">Ação</th>
                                    <th class="wd-15p border-bottom-0">Recomendação</th>
                                    <th class="wd-15p border-bottom-0">Comentário</th>
                                    <th class="wd-15p border-bottom-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                use Carbon\Carbon;
                                @endphp

                                @foreach ( $avaliacoesList as $items )
                                <tr style="transition: none !important; transform: none !important;">
                                    <td class="nome_completo">{{ $items->nome_completo}}</td>
                                    <td class="departamento">{{ $items->departamento}}</td>
                                    <td class="funcao">{{ $items->nome_cargo}}</td>
                                    <td class="tipo_avaliacao">{{ $items->tipo_avaliacao}}</td>
                                    <td class="data">{{ Carbon::parse($items->data)->format('d-m-Y')}}</td>
                                    <td class="departamento">{{ $items->acao}}</td>
                                    <td class="funcao">{{ $items->c_avaliador}}</td>
                                    <td class="tipo_avaliacao">{{ $items->c_avaliado}}</td>
                                    <td>
                                        <a href="{{ url('form/avaliacao/delete',['id_avaliacao' => $items->id])}}" class="btn btn-secondary btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta avaliação?')"><i class="zmdi zmdi-delete"></i>&nbsp;Excluir</a>
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
                <h6 class="modal-title"> <i class="fe fe-plus-circle"></i> Cadastro de competência</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="">
                        <div class="form-group">
                            <label for="nome" class="form-label">Competência</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite a competência">
                        </div>
                        <div class="form-group">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea class="form-control mb-4" placeholder="Descrição da competência" rows="3" name="descricao" id="descricao"></textarea>
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
                <h6 class="modal-title"> <i class="fe fe-plus-circle"></i> Edição de competência</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="e_id" value="">
                    <div class="">
                        <div class="form-group">
                            <label for="nome" class="form-label">Competência</label>
                            <input type="text" class="form-control" name="nome" id="nome_edit">
                        </div>
                        <div class="form-group">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea class="form-control mb-4" rows="3" name="descricao" id="descricao_edit"></textarea>
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
        $('#nome_edit').val(_this.find('.nome').text());
        $('#descricao_edit').val(_this.find('.descricao').text());
    });

</script>

@endsection

@endsection
