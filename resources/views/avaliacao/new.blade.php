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
    <h1>Competências Relacionadas ao Funcionário</h1>

    <select id="funcionarioSelect">
        <option value="">Selecione um funcionário</option>
         @foreach($funcionariosList as $cargo)
         <option value="{{$cargo->funcao}}">{{ $cargo->nome_cargo }}</option>
         @endforeach

    </select>

    <table id="competenciasTable">
        <thead>
            <tr>
                <th>Nome da Competência</th>
                <th>Descrição</th>
                <th>Nível</th>
            </tr>
        </thead>
        <tbody id="competenciasBody">
            <!-- Aqui serão exibidas as competências -->
        </tbody>
    </table>



    <!-- /Row -->

</div>
</div>

@section('scripts')
<script type="text/javascript">
    document.getElementById('funcionarioSelect').addEventListener('change', function() {
        var funcionarioId = this.value;

        if (funcionarioId) {
            fetch(`/competencias/${funcionarioId}`)
                .then(response => response.json())
                .then(data => {
                    var tableBody = document.querySelector('#competenciasBody');
                    tableBody.innerHTML = '';

                    data.forEach(competencia => {
                        var row = tableBody.insertRow();
                        row.insertCell(0).textContent = competencia.competencia;
                        row.insertCell(1).textContent = competencia.dep;
                        row.insertCell(2).textContent = competencia.cargo;
                    });
                });
        } else {
            // Limpar a tabela se nenhum funcionário for selecionado
            document.querySelector('#competenciasTable tbody').innerHTML = '';
        }
    });

</script>


@endsection


@endsection
