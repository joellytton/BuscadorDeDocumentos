@extends('layouts.app')


{{-- Page Title --}}
@section('page-title')
Dashboard
@endsection

{{-- This Page Css --}}
@section('css')
<!--=========================*
           AM Chart
    *===========================-->
<link rel="stylesheet" href="{{asset('assets/vendors/am-charts/css/am-charts.css')}}" type="text/css" media="all" />

<!--=========================*
               Morris Css
    *===========================-->
<link rel="stylesheet" href="{{asset('assets/vendors/charts/morris-bundle/morris.css')}}">

<!--=========================*
              Flag Icons
    *===========================-->
<link href="{{asset('assets/css/flag-icon.min.css')}}" rel="stylesheet" />
@endsection

@section('main-content')
<div class="row">
    <div class="col-lg-8 stretched_card">
        <div class="card">
            <div class="card-body">
                <h4 class="card_title mb-2">Top 5 Documentos por Categoria</h4>
                <div class="chart_container">
                    <canvas id="bar_chart" class="mt-4" style="height: 500px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 stretched_card d-block-mob">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-icon rt_icon_card mb-4 mt-mob-4 text-center">
                    <div class="card-body">
                        <div class="icon_rt">
                            <i class="feather ft-users"></i>
                        </div>
                        <div class="icon_specs">
                            <p>Usuários</p>
                            <span>{{$quantidadeUsuariosAtivoDoSistema}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-icon rt_icon_card mb-4 text-center">
                    <div class="card-body">
                        <div class="icon_rt">
                            <i class="feather ft-activity"></i>
                        </div>
                        <div class="icon_specs">
                            <p>Documentos</p>
                            <span>{{$quantidadeDeDocumentos}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-icon rt_icon_card mb-0 text-center">
                    <div class="card-body">
                        <div class="icon_rt">
                            <i class="feather ft-activity"></i>
                        </div>
                        <div class="icon_specs">
                            <p>Recomendações</p>
                            <span>{{$quantidadeDeRecomendacoes}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!--=========================*
            This Page Scripts
    *===========================-->
<!-- start amchart js -->
<script src="{{asset('assets/vendors/am-charts/js/ammap.js')}}"></script>
<script src="{{asset('assets/vendors/am-charts/js/worldLow.js')}}"></script>
<script src="{{asset('assets/vendors/am-charts/js/continentsLow.js')}}"></script>
<script src="{{asset('assets/vendors/am-charts/js/light.js')}}"></script>
<!-- maps js -->
<script src="{{asset('assets/js/am-maps.js')}}"></script>

<!--Morris Chart-->
<script src="{{asset('assets/vendors/charts/morris-bundle/raphael.min.js')}}"></script>
<script src="{{asset('assets/vendors/charts/morris-bundle/morris.js')}}"></script>

<!--Chart Js-->
<script src="{{asset('assets/vendors/charts/charts-bundle/Chart.bundle.js')}}"></script>

<!--Home Script-->
<script src="{{asset('assets/js/home.js')}}"></script>
<script>
    jQuery(document).ready(function ($) {
        if ($('#bar_chart').length) {
            var ctx = document.getElementById("bar_chart").getContext('2d');
            var labels = <?php echo json_encode($nomeCategorias)?>;
            var datas = <?php echo json_encode($quantidadeDeDocumentoPorCategoria) ?>;
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Documentos por Categoria',
                        backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9",
                            "#c45850"],
                        data: datas,
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    scales: {
                        yAxes: [{
                             ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
                }
            });
        }
    });

</script>
@endsection
