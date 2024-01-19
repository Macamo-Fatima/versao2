@extends('dashboards.admin.layouts.admin-dash')
@section('title', 'Painel de usuários')

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
                    <li class="breadcrumb-item"><a href="#"><i class="fe fe-users mr-2 fs-14"></i>Usuários</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">View</a></li>
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
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Bar Chart</div>
                </div>
                <div class="card-body">
                    <div class="morris-wrapper-demo" id="morrisBar1"></div>
                </div>
            </div>
        </div><!-- col-6 -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Stacked Bar Chart</div>
                </div>
                <div class="card-body">
                    <div class="morris-wrapper-demo" id="morrisBar3"></div>
                </div>
            </div>
        </div><!-- col-6 -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Line Chart</div>
                </div>
                <div class="card-body">
                    <div class="morris-wrapper-demo" id="morrisLine1"></div>
                </div>
            </div>
        </div><!-- col-6 -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Area Chart</div>
                </div>
                <div class="card-body">
                    <div class="morris-wrapper-demo" id="morrisArea1"></div>
                </div>
            </div>
        </div><!-- col-6 -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Donut Chart</div>
                </div>
                <div class="card-body">
                    <div class="morris-donut-wrapper-demo" id="morrisBar6"></div>
                </div>
            </div>
        </div><!-- col-6 -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Donut Chart</div>
                </div>
                <div class="card-body">
                    <div class="morris-donut-wrapper-demo" id="morrisBar7"></div>
                </div>
            </div>
        </div><!-- col-6 -->
        <div class="col-lg-6">
            <div class="card mg-b-md-20">
                <div class="card-header">
                    <div class="card-title">Donut Chart</div>
                </div>
                <div class="card-body">
                    <div class="morris-donut-wrapper-demo" id="morrisDonut1"></div>
                </div>
            </div>
        </div><!-- col-6 -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Alterado</div>
                </div>
                <div class="card-body">
                    <div class="morris-wrapper-demo" id="morrisBar20"></div>
                </div>
            </div>
        </div><!-- col-6 -->

    </div>
    <!-- /Row -->

    <div style="width: 900px; margin:auto;">
        <canvas id="myChart">

        </canvas>

    </div>



</div>
</div>


@section('scripts')
<script>
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'bar'
        , data: {
            labels: ['Vermelho', 'Azul', 'Amarelo', 'Verde', 'Maron', 'Laranja']
            , datasets: [{
                label: '# of Votes'
                , data: [12, 19, 3, 5, 2, 3]
                , borderWidth: 1
            }]
        }
        , options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

</script>

<script>
    // var ctx = document.getElementById('chart').getContext('2d');
    // var userChart = new Chart(ctx, {
    //     type: 'bar'
    //     , data: {
    //         labels: {
    //            {!!json_encode($labels) !!}

    //         }
    //         , datasets: {
    //             {!!json_encode($datasets) !!}
    //         }

    //     }
    // , })

    var morrisData = [{
        y: '2006'
        , a: 12
        , b: 18
    }, {
        y: '2007'
        , a: 18
        , b: 22
    }, {
        y: '2008'
        , a: 15
        , b: 18
    }, {
        y: '2009'
        , a: 25
        , b: 28
    }, {
        y: '2010'
        , a: 30
        , b: 35
    }, {
        y: '2011'
        , a: 18
        , b: 28
    }, {
        y: '2012'
        , a: 12
        , b: 18
    }];

    new Morris.Bar({
        element: 'morrisBar20'
        , data: morrisData
        , xkey: 'y'
        , ykeys: ['a', 'b']
        , labels: ['Series A', 'Series B']
        , barColors: ['#705ec8', '#fb1c52']
        , gridTextSize: 11
        , hideHover: 'auto'
        , resize: true
    });

</script>

<script>
    $(function() {
        'use strict'

        // Message
        $("#but1").on("click", function(e) {
            $('body').removeClass('timer-alert');
            var message = $("#message").val();
            if (message == "") {
                message = "New Notification from Admitro";
            }
            swal(message);
        });

        // With message and title
        $("#but2").on("click", function(e) {
            $('body').removeClass('timer-alert');
            var message = $("#message").val();
            var title = $("#title").val();
            if (message == "") {
                message = "New Notification from Admitro";
            }
            if (title == "") {
                title = "Notifiaction Styles";
            }
            swal(title, message);
        });

        // Show image
        $("#but3").on("click", function(e) {
            $('body').removeClass('timer-alert');
            var message = $("#message").val();
            var title = $("#title").val();
            if (message == "") {
                message = "New Notification from Admitro";
            }
            if (title == "") {
                title = "Notifiaction Styles";
            }
            swal({
                title: title
                , text: message
                , imageUrl: '../../assets/images/brand/favicon.png'
            });
        });
    })

</script>
@endsection

@endsection
