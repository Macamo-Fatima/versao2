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
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Cadastro</a></li>
                </ol>
            </div>
            <div class="page-rightheader">
                {{-- <div class="btn btn-list">
                    <a href="{{route('admin/novo/usuario')}}" class="btn btn-blue btn-sm"><i class="mdi mdi-account-plus mr-1"></i> Criar novo </a>
                <a href="{{route('admin/grelha/usuario')}}" class="btn btn-red btn-sm"><i class="mdi mdi-apps mr-1"></i> Lista grelha </a>
                <a href="{{route('admin/listar/usuario')}}" class="btn btn-warning btn-sm"><i class="fe fe-align-justify mr-1"></i> Lista Simples </a>
                <a href="{{route('admin/logs/usuario')}}" class="btn btn-dark btn-sm"><i class="fe fe-align-justify mr-1"></i> Logs de usuários </a>
            </div> --}}
        </div>
    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold"><i class="fe fe-plus-circle mr-1"></i>Cadastro de avaliação</span>
                    <div>
                        <a href="{{route('listar/avaliacoes')}}" class="btn btn-blue  btn-sm"><i class="fe fe-arrow-left-circle mr-1"></i> Voltar</a>
                    </div>
                </div>
                <div class="card-body">

                    {{-- action="{{route('form/avaliacao/save')}}" method="POST" id="form" --}}

                    <form id="formulario_avaliacao" method="POST" action="/salvar-avaliacao">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="form-label"><span class="small">Tipo de avaliação</span><span class="text-danger"> *</span></label>
                                <select class="form-control select2" name="tipo_avaliacao" id="tipo_avaliacao" required>
                                    <option value=""> Tipo de avaliação</option>
                                    <option value="Semestral">Semestral</option>
                                    <option value="Anual">Anual</option>
                                </select>

                            </div>

                            <div class="col-md-3">
                                <label class="form-label" for="data-realizacao"><span class="small">Data da realização</span><span class="text-danger"> *</span></label>
                                <input type="datetime-local" class="form-control" name="data_realizacao" id="data_realizacao" placeholder="Seleciona a data" onfocus="
                                                 this.placeholder=''" onblur="this.placeholder='Seleciona a data'" required />

                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><span class="small ">Colaborador</span><span class="text-danger"> *</span></label>
                                <select class="form-control select2" name="funcionario" id="funcao" required>
                                    <option value="">Seleciona o colaborador</option>
                                    @foreach ($funcionariosList as $service)
                                    <option value="{{$service->id}}" data-price="{{$service->nome_cargo}}" data-price1="{{$service->nome_completo}}" data-price2="{{$service->funcao}}">{{$service->nome_completo}}
                                        @php
                                        $cargo = $service->nome_cargo;
                                        $funcao = $service->funcao;
                                        @endphp
                                    </option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="example-email"><span class="small">Cargo</span></label>
                                <input type="text" id="grupo" name="grupo" class="form-control" value="" readonly>
                            </div>
                        </div>
                        <hr>
                        <label class="form-label"><i class="fe fe-list mr-1"></i><span class="small font-weight-bold">Competências</span><span class="text-danger"> *</span></label>
                        <div class="table-responsive">
                            <table id="competenciasTable" class="table table-hover card-table table-vcenter text-nowrap table-sm">
                                <tbody id="competenciasBody">
                                    <!-- Aqui serão exibidas as competências -->
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <label class="form-label"><i class="fe fe-list mr-1"></i><span class="small font-weight-bold">Objectivos</span><span class="text-danger"> *</span></label>
                        <div class="table-responsive">
                            <table id="objetivosTable" class="table table-hover card-table table-vcenter text-nowrap table-sm">
                                <tbody id="objetivosBody">
                                    <!-- Aqui serão exibidos os objetivos-->
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="form-label"><span class="small">Ação de formação</span></label>
                                <textarea class="form-control" cols="2" rows="2" name="acao" id="acao" placeholder="Digite a ação necessária para melhoria do desempenho do colaborador" onfocus="
                            this.placeholder=''" onblur="this.placeholder='Digite a ação necessária para melhoria do desempenho do colaborador'"></textarea>

                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="data-realizacao"><span class="small">Recomendações do avaliador</span></label>
                                <textarea class="form-control" cols="2" rows="2" name="recomendacao" id="recomendacao" placeholder="Digite as recomendações do avaliador" onfocus="
                            this.placeholder=''" onblur="this.placeholder='Digite as recomendações do avaliador'" required></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><span class="small ">Comentários do avaliado</span><span class="text-danger"> *</span></label>
                                <textarea class="form-control" cols="2" rows="2" name="comentario" id="comentario" placeholder="Digite os comentários do avaliado" onfocus="
                            this.placeholder=''" onblur="this.placeholder='Digite os comentários do avaliado'"></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-0 mt-4 row justify-content-end">
                            <div class="col-md-7">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-info float-right btn-sm mr-3"><i class="fe fe-save"></i>&nbsp;Salvar</button>
                                <a href="{{route('listar/avaliacoes')}}" class="btn btn-danger float-right btn-sm  mr-2"> <i class="fe fe-arrow-left-circle"></i> Voltar</a>
                            </div>
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

<script>
    // select auto nome e grupo funcional// was not used no more
    //$('#funcionario').on('change', function() {
    // $('#cargo').val($(this).find(':selected').data('grupo_funcional'));
    // });

</script>

{{-- script para auto select de cargo --}}
<script>
    // $('#funcao').on('change', function() {
    //     var price = $(this).children('option:selected').data('price');
    //     $('#grupo').val(price);
    // });

</script>

{{-- script para preview de imagem --}}
<script type="text/javascript">
    $('#fotografia').change(function() {

        let reader = new FileReader();

        reader.onload = (e) => {

            $('#preview-image').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

    });

</script>

{{-- script de inicialização de flatpickr  js --}}
<script type="text/javascript">
    config = {
        altInput: true
        , altFormat: "F j, Y"
        , dateFormat: "Y-m-d"
    , }

    flatpickr("input[type=datetime-local]", config);

</script>

{{-- script para inicialização de parsley js --}}
<script>
    $('#form').parsley();

</script>

{{-- script para popular tabela de competencias --}}
<script>
    $(document).ready(function() {
        $('#funcao').change(function() {
            var funcionarioId = $(this).val();
            var nomeCargo = $(this).find(':selected').data('price');
            var nomeCompleto = $(this).find(':selected').data('price1');
            var nomeCargo1 = $(this).find(':selected').data('price2');
            var price = $(this).children('option:selected').data('price');
            $('#grupo').val(price);

            if (nomeCargo1) {
                $.ajax({
                    type: 'GET'
                    , url: '/competencias/' + nomeCargo1
                    , success: function(data) {
                        var tableBody = $('#competenciasBody');
                        tableBody.empty(); // Limpar qualquer conteúdo anterior

                        $.each(data, function(index, competencia) {
                            var row = '<tr class="small">' +
                                '<td class="small">' + competencia.tipo_competencia + '</td>' +
                                // '<td class="small">' + competencia.dep + '</td>' +
                                '<td class="small">' +
                                '<div class="form-check form-check-inline mx-4">' +
                                '<input class="form-check-input form-control mx-1" type="radio" name="avaliacao[' + index + ']" value="1" required> 1 ' +
                                '</div>' +
                                '<div class="form-check form-check-inline mx-4">' +
                                '<input class="form-check-input form-control mx-1" type="radio" name="avaliacao[' + index + ']" value="2" required> 2 ' +
                                '</div>' +
                                '<div class="form-check form-check-inline mx-4">' +
                                '<input class="form-check-input form-control mx-1" type="radio" name="avaliacao[' + index + ']" value="3" required> 3 ' +
                                '</div>' +
                                '<div class="form-check form-check-inline mx-4">' +
                                '<input class="form-check-input form-control mx-1" type="radio" name="avaliacao[' + index + ']" value="4" required> 4 ' +
                                '</div>' +
                                '<div class="form-check form-check-inline mx-4">' +
                                '<input class="form-check-input form-control mx-1" type="radio" name="avaliacao[' + index + ']" value="5" required> 5 ' +
                                '</div>' +
                                '</td>' +
                                '</tr>';
                            tableBody.append(row);
                        });
                    }
                });
            } else {
                $('#competenciasTable tbody').empty();
            }


            if (nomeCompleto) {
                $.ajax({
                    type: 'GET'
                    , url: '/objetivos/' + nomeCompleto
                    , success: function(data) {
                        var tableBody = $('#objetivosBody');
                        tableBody.empty(); // Limpar qualquer conteúdo anterior

                        $.each(data, function(index, objetivo) {
                            var row = '<tr class="small">' +
                                '<td class="small">' + objetivo.tipo_objetivo + '</td>' +
                                // '<td class="small">' + objetivo.dep_funcionario + '</td>' +
                                '<td>' +
                                '<div class="form-check form-check-inline mx-4">' +
                                '<input class="form-check-input mx-1" type="radio" name="objetivo[' + index + ']" value="1" required> 1 ' +
                                '</div>' +
                                '<div class="form-check form-check-inline mx-4">' +
                                '<input class="form-check-input mx-1" type="radio" name="objetivo[' + index + ']" value="2" required> 2 ' +
                                '</div>' +
                                '<div class="form-check form-check-inline mx-4">' +
                                '<input class="form-check-input mx-1" type="radio" name="objetivo[' + index + ']" value="3" required> 3 ' +
                                '</div>' +
                                '<div class="form-check form-check-inline mx-4">' +
                                '<input class="form-check-input mx-1" type="radio" name="objetivo[' + index + ']" value="4" required> 4 ' +
                                '</div>' +
                                '<div class="form-check form-check-inline mx-4">' +
                                '<input class="form-check-input mx-1" type="radio" name="objetivo[' + index + ']" value="5" required> 5 ' +
                                '</div>' +
                                '</td>' +
                                '</tr>';
                            tableBody.append(row);
                        });
                    }
                });
            } else {
                $('#objetivosTable tbody').empty();
            }

        });
    });

</script>


{{-- por se analisar // script de envio de dados --}}
<script>
    $('#formulario_avaliacao').submit(function(e) {
        e.preventDefault();
        // Captura a data da realização da avaliação
        var dataAvaliacao = $('input[name="data_realizacao"]').val();
        // Captura o ID do funcionário selecionado
        var funcionarioId = $('#funcao').val();
        // Captura o tipo de avaliacao
        var tipoAvaliacao = $('#tipo_avaliacao').val();
        // Captura o valor do <textarea> de ação a ser feita para melhoria de desempenho
        var acao = $('#acao').val();
        // Captura o valor do <textarea> de recomendação do avaliador
        var recomendacao = $('#recomendacao').val();
        // Captura o valor do <textarea> de comentário de avaliado
        var comentario = $('#comentario').val();

        // Crie um objeto para armazenar as avaliações
        var avaliacoes = {};
        var objetivos = {};


        // Percorra as linhas da tabela de competências
        $('#competenciasTable tbody tr').each(function() {
            var competenciaId = $(this).find('input[type="radio"]:checked').attr('name').split('_')[1];
            var avaliacao = $(this).find('input[type="radio"]:checked').val();
            avaliacoes[competenciaId] = avaliacao;
        });

        // Percorra as linhas da tabela de objetivos
        $('#objetivosTable tbody tr').each(function() {
            var objetivoId = $(this).find('input[type="radio"]:checked').attr('name').split('_')[1];
            var objetivo = $(this).find('input[type="radio"]:checked').val();
            objetivos[objetivoId] = objetivo;
        });

        // Adicione os campos estáticos e as avaliações ao objeto de dados
        var dadosAvaliacao = {
            tipo_avaliacao: tipoAvaliacao
            , data_avaliacao: dataAvaliacao
            , funcionario_id: funcionarioId
            , acao: acao
            , recomendacao: recomendacao
            , comentario: comentario
            , avaliacoes: avaliacoes
            , objetivos: objetivos
        };

        // Envie o formulário
        $.ajax({
            url: '/salvar-avaliacao'
            , type: 'POST'
            , data: dadosAvaliacao, // Agora, inclui os campos estáticos e as avaliações
            _token: $('meta[name="csrf-token"]').attr('content')
            success: function(response) {
                // Lógica de manipulação da resposta após o envio
                console.log(response);
                // Por exemplo, redirecionar o usuário após o salvamento
                // window.location.href = '/outra-pagina';
            }
        });
    });

</script>

{{-- script para popular tabela de objetivos --}}
<script>
    $(document).ready(function() {
        $('#funcionarioSelectObjetivos').change(function() {
            var nomeFuncionario = $(this).val();

        });
    });

</script>
@endsection


@endsection
