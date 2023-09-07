@extends('layouts.dashboard')

@section('content')
<div id="global-loader" ></div>
<div class="page">
    <div class="page-main">
        @include('common.sidebar.index')

        <!-- app-content-->
        <div class="app-content ">
            <div class="side-app">
                <div class="main-content">
                    <div class="p-2 d-block d-sm-none navbar-sm-search">
                        <!-- Form -->
                        <form class="navbar-search navbar-search-dark form-inline ml-lg-auto">
                            <div class="form-group mb-0">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div><input class="form-control" placeholder="Search" type="text">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Top navbar -->
                    @include('common.header.top.navbar')
                    <!-- Top navbar-->

                    <!-- Page content -->
                    <div class="container-fluid pt-8">

                        @include('common.header.page.header' , ['pageTitle' => 'Service Dashboard'])

                        <div class="row ">
                            <div class="col-xl-3 col-md-6">
                                <div class="card shadow text-center">
                                    <div class="card-body">
                                        <h3 class="mb-2">First call resolution</h3>
                                        <h2 class="text-xl mb-0 text-primary">75%</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card shadow text-center">
                                    <div class="card-body">
                                        <h3 class="mb-2">Unresolved calls</h3>
                                        <h2 class="text-xl mb-0 text-info">7%</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card shadow text-center">
                                    <div class="card-body">
                                        <h3 class="mb-2">Avg Response time</h3>
                                        <h2 class="text-xl mb-0 text-danger">1:05s</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card shadow text-center">
                                    <div class="card-body">
                                        <h3 class="mb-2">Best Day to call</h3>
                                        <h2 class="text-xl mb-0 text-success">Wed</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card  shadow">
                                    <div class="card-header bg-transparent">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                                <h2 class="mb-0">Response TIme By Weekday</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!-- Chart -->
                                        <canvas id="service-chart" class="chart-dropshadow h-300"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card  shadow">
                                    <div class="card-header bg-transparent">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                                <h2 class="mb-0">Customer Satisfaction</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!-- Chart -->
                                        <canvas id="pieChart" class="chart-dropshadow h-300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row service-content">
                            <div class="col-lg-12">
                                <div class="card shadow">
                                    <div class="card-header bg-transparent">
                                        <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                        <h2 class="mb-0">Service And Support Leadership</h2>
                                    </div>
                                    <div class="card-body border-bottom">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="">
                                                    <h2 class="mb-0">Customer Retention</h2>
                                                    <h4 class="mb-4">Last Month</h4>
                                                    <a href="#" class="btn btn-md btn-pill btn-success mb-4 mb-lg-0">18%</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <canvas id="service-chart4" class="chart-dropshadow h-120"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-bottom">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="">
                                                    <h2 class="mb-0">Resolved Complaints</h2>
                                                    <h4 class="mb-4">Last Month</h4>
                                                    <a href="#" class="btn btn-md btn-pill btn-primary">821</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <canvas id="service-chart5" class="chart-dropshadow h-120"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-bottom">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="">
                                                    <h2 class="mb-0">Unresolved Complaints</h2>
                                                    <h4 class="mb-4">Last Month</h4>
                                                    <a href="#" class="btn btn-md btn-pill btn-info mb-4 mb-lg-0">12</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <canvas id="service-chart6" class="chart-dropshadow h-120"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card  shadow">
                                    <div class="card-header bg-transparent">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                                <h2 class="mb-0">Response TIme By Weekday</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!-- Chart -->
                                        <canvas id="service-chart2" class="chart-dropshadow h-300"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card  shadow">
                                    <div class="card-header bg-transparent">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                                <h2 class="mb-0">Customer retention</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!-- Chart -->
                                        <canvas id="service-chart3" class="chart-dropshadow h-300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Footer -->
                        <footer class="footer">
                            <div class="row align-items-center justify-content-xl-between">
                                <div class="col-xl-6">
                                    <div class="copyright text-center text-xl-left text-muted">
                                        <p class="text-sm font-weight-500">Copyright 2020 © Twhive</p>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <p class="float-right text-sm font-weight-500">Designed &amp; Passion With: <a href="">Yelena</a></p>
                                </div>
                            </div>
                        </footer>
                        <!-- Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- app-content-->
    </div>
</div>
@endsection
