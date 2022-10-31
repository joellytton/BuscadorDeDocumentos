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
    <link href="{{asset('assets/css/flag-icon.min.css')}}" rel="stylesheet"/>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-8 stretched_card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card_title mb-2">Pedidos de Execução de Despesa</h4>
                    <div class="d-flex flex-wrap align-items-baseline">
                        <h2 class="mr-3">89,99 $</h2>
                        <i class="feather ft-arrow-up mr-1 text-success"></i><span><cite class="mb-0 text-success font-weight-medium">4.89%</cite></span>
                    </div>
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
                                <p>Pedidos</p>
                                <span>670</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-icon rt_icon_card mb-0 text-center">
                        <div class="card-body">
                            <div class="icon_rt">
                                <i class="feather ft-shopping-bag"></i>
                            </div>
                            <div class="icon_specs">
                                <p>Saldos</p>
                                <span>9466</span>
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
@endsection