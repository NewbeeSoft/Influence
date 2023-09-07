@extends('layouts.search')

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

                        @include('common.header.page.search' , ['pageTitle' => 'Influencer Search'])
                        <div class="friend-list">
                            <div id="profileDiv" class="row">
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
