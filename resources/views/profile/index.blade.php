@extends('layouts.profile')

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

                        @include('common.header.page.header' , ['pageTitle' => 'User profile'])

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-profile  overflow-hidden">
                                    <div class="card-body text-center cover-image" data-image-src="/assets/img/profile-bg.jpg">
                                        <div class=" card-profile">
                                            <div class="row justify-content-center">
                                                <div class="">
                                                    <div class="">
                                                        <a href="#">
                                                        <img src="{{$fbInfo ? $fbInfo->ig_avatar_url : '/assets/img/faces/non-img.png'}}" class="rounded-circle profile-image" alt="profile">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="mt-3 text-white">{{$profile->fullName() ?? ''}}</h3>
                                        {{-- <p class="mb-4 text-white">Administrator</p> --}}
                                        {{-- <button class="btn btn-primary btn-sm">
                                            <span class="fab fa-twitter"></span> Follow
                                        </button> --}}
                                        <a href="/profile/edit" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit profile</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="nav-wrapper p-0">
                                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link mb-sm-3 mb-md-0 active show mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fas fa-home mr-2"></i>About</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-b-tab" data-toggle="tab" href="#tabs-icons-text-b" role="tab" aria-controls="tabs-icons-text-b" aria-selected="false"><i class="fas fa-user mr-2"></i>Social</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-user mr-2"></i>Friends</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="far fa-images mr-2"></i>Photos</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-4-tab" data-toggle="tab" href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4" aria-selected="false"><i class="fas fa-newspaper mr-2"></i>Timeline</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link mb-sm-0 mb-md-0 mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-5-tab" data-toggle="tab" href="#tabs-icons-text-5" role="tab" aria-controls="tabs-icons-text-5" aria-selected="false"><i class="fas fa-cog mr-2"></i>More</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow ">
                                    <div class="card-body pb-0">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                                <h2>About Me</h2>
                                                <p class="description">
                                                    {!!$profile->about_me ?? ''!!}
                                                </p>
                                                <div class="table-responsive border ">
                                                    <table class="table row table-borderless w-100 m-0 ">
                                                        <tbody class="col-lg-6 p-0">
                                                            <tr>
                                                                <td><strong>Full Name :</strong> {{$profile->fullName() ?? ''}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Country :</strong> {{$profile->county_name ?? ''}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Website :</strong> {{$profile->web_site ?? ''}}</td>
                                                            </tr>
                                                            {{-- <tr>
                                                                <td><strong>Location :</strong> {{$profile->country_id ?? ''}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Languages :</strong> English, German, Spanish.</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>DOB :</strong> 18/02/1992</td>
                                                            </tr> --}}
                                                        </tbody>
                                                        <tbody class="col-lg-6 p-0">
                                                            {{-- <tr>
                                                                <td><strong>Occupation :</strong> Administrator</td>
                                                            </tr> --}}

                                                            <tr>
                                                                <td><strong>Email :</strong> {{$profile->public_email ?? ''}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Phone :</strong> {{$profile->phone ?? ''}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <p class="mb-4"></p>
                                                {{-- <div class="media-heading mt-3">
                                                    <h3><strong>Biography</strong></h3>
                                                </div>
                                                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus</p>
                                                <p class="mb-4">because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p> --}}
                                            </div>
                                            <div aria-labelledby="tabs-icons-text-b-tab" class="tab-pane fade" id="tabs-icons-text-b" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-12 ">
                                                        <div class="form-group">
                                                            {{-- <button disabled type="button" class="btn btn-instagram mt-1 mb-1" onclick="window.location.href='{{$igLink}}'"><i class="fe fe-instagram mr-2"></i>Instagram</button> --}}
                                                            <button {{$igInfo ? 'disabled' : null}} type="button" class="btn btn-instagram mt-1 mb-1"><i class="fe fe-instagram mr-2"></i>Instagram</button>
                                                            <button {{$fbInfo ? 'disabled' : null}} type="button" class="btn btn-facebook mt-1 mb-1"><i class="fe fe-facebook mr-2"></i>Facebook</button>
                                                            <button type="button" class="btn btn-twitter mt-1 mb-1"><i class="fe fe-twitter mr-2"></i>Twitter</button>
                                                            <button type="button" class="btn btn-youtube mt-1 mb-1"><i class="fe fe-play mr-2"></i>Youtube</button>
                                                        </div>
                                                        {{-- <div class = "fb-login-button" data-size = "large" data-button-type = "continue_with" data-layout = "default" data-auto-logout-link = "false" data-use-continue -as = "false" data-width = "" > </div>  --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div aria-labelledby="tabs-icons-text-2-tab" class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="content content-full-width" id="content">
                                                            <!-- begin profile-content -->
                                                            <div class="profile-content">
                                                                <!-- begin tab-content -->
                                                                <div class="tab-content p-0">
                                                                    <!-- begin #profile-friends tab -->
                                                                    <div class="tab-pane fade in active show" id="profile-friends">
                                                                        <h4 class="mt-0 mb-4">Friend List (14)</h4><!-- begin row -->
                                                                        <div class="row">
                                                                            <!-- end col-6 -->
                                                                            <div class=" col-lg-6 col-md-12">
                                                                                <div class="card border shadow over-flow-hidden">
                                                                                    <div class="media card-body media-xs overflow-visible ">
                                                                                        <a class="media-left" href="javascript:;"><img alt="" class="avatar avatar-md img-circle" src="assets/img/faces/female/2.jpg"></a>
                                                                                        <div class="media-body valign-middle">
                                                                                            <b class="text-inverse">Latoya Laver</b>
                                                                                        </div>
                                                                                        <div class="media-body valign-middle text-right overflow-visible">
                                                                                            <div class="btn-group">
                                                                                                <button class="btn btn-sm btn-primary" type="button">View</button> <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" type="button"><span class="caret"></span> <span class="sr-only">View profile</span></button>
                                                                                                <div class="dropdown-menu">
                                                                                                    <a class="dropdown-item" href="#">Follow</a>
                                                                                                    <a class="dropdown-item" href="#">Message</a>
                                                                                                    <a class="dropdown-item" href="#">Suggestion</a>
                                                                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end col-6 -->
                                                                            <div class="col-lg-6 col-md-12">
                                                                                <div class="card border shadow">
                                                                                    <div class="media card-body media-xs overflow-visible">
                                                                                        <a class="media-left" href="javascript:;"><img alt="" class="avatar avatar-md img-circle" src="assets/img/faces/female/4.jpg"></a>
                                                                                        <div class="media-body valign-middle">
                                                                                            <b class="text-inverse">Polly Amon</b>
                                                                                        </div>
                                                                                        <div class="media-body valign-middle text-right overflow-visible">
                                                                                            <div class="btn-group">
                                                                                                <button class="btn btn-sm btn-primary" type="button">View</button> <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" type="button"><span class="caret"></span> <span class="sr-only">View profile</span></button>
                                                                                                <div class="dropdown-menu">
                                                                                                    <a class="dropdown-item" href="#">Follow</a>
                                                                                                    <a class="dropdown-item" href="#">Message</a>
                                                                                                    <a class="dropdown-item" href="#">Suggestion</a>
                                                                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end col-6 -->
                                                                            <div class=" col-lg-6 col-md-12">
                                                                                <div class="card border shadow">
                                                                                    <div class="media card-body media-xs overflow-visible">
                                                                                        <a class="media-left" href="javascript:;"><img alt="" class="avatar avatar-md img-circle" src="assets/img/faces/male/2.jpg"></a>
                                                                                        <div class="media-body valign-middle">
                                                                                            <b class="text-inverse">Arceneaux</b>
                                                                                        </div>
                                                                                        <div class="media-body valign-middle text-right overflow-visible">
                                                                                            <div class="btn-group">
                                                                                                <button class="btn btn-sm btn-primary" type="button">View</button> <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" type="button"><span class="caret"></span> <span class="sr-only">View profile</span></button>
                                                                                                <div class="dropdown-menu">
                                                                                                    <a class="dropdown-item" href="#">Follow</a>
                                                                                                    <a class="dropdown-item" href="#">Message</a>
                                                                                                    <a class="dropdown-item" href="#">Suggestion</a>
                                                                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end col-6 -->
                                                                            <div class="col-lg-6 col-md-12">
                                                                                <div class="card border shadow">
                                                                                    <div class="media card-body media-xs overflow-visible">
                                                                                        <a class="media-left" href="javascript:;"><img alt="" class="avatar avatar-md img-circle" src="assets/img/faces/female/1.jpg"></a>
                                                                                        <div class="media-body valign-middle">
                                                                                            <b class="text-inverse">Corinna Eifert</b>
                                                                                        </div>
                                                                                        <div class="media-body valign-middle text-right overflow-visible">
                                                                                            <div class="btn-group">
                                                                                                <button class="btn btn-sm btn-primary" type="button">View</button> <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" type="button"><span class="caret"></span> <span class="sr-only">View profile</span></button>
                                                                                                <div class="dropdown-menu">
                                                                                                    <a class="dropdown-item" href="#">Follow</a>
                                                                                                    <a class="dropdown-item" href="#">Message</a>
                                                                                                    <a class="dropdown-item" href="#">Suggestion</a>
                                                                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end col-6 -->
                                                                            <div class="col-lg-6 col-md-12">
                                                                                <div class="card border shadow">
                                                                                    <div class="media card-body media-xs overflow-visible">
                                                                                        <a class="media-left" href="javascript:;"><img alt="" class="avatar avatar-md img-circle" src="assets/img/faces/female/3.jpg"></a>
                                                                                        <div class="media-body valign-middle">
                                                                                            <b class="text-inverse">Kenna Pride</b>
                                                                                        </div>
                                                                                        <div class="media-body valign-middle text-right overflow-visible">
                                                                                            <div class="btn-group">
                                                                                                <button class="btn btn-sm btn-primary" type="button">View</button> <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" type="button"><span class="caret"></span> <span class="sr-only">View profile</span></button>
                                                                                                <div class="dropdown-menu">
                                                                                                    <a class="dropdown-item" href="#">Follow</a>
                                                                                                    <a class="dropdown-item" href="#">Message</a>
                                                                                                    <a class="dropdown-item" href="#">Suggestion</a>
                                                                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end col-6 -->
                                                                            <div class="col-lg-6 col-md-12">
                                                                                <div class="card border shadow">
                                                                                    <div class="media card-body media-xs overflow-visible">
                                                                                        <a class="media-left" href="javascript:;"><img alt="" class="avatar avatar-md img-circle" src="assets/img/faces/male/3.jpg"></a>
                                                                                        <div class="media-body valign-middle">
                                                                                            <b class="text-inverse">Mark Sunseri</b>
                                                                                        </div>
                                                                                        <div class="media-body valign-middle text-right overflow-visible">
                                                                                            <div class="btn-group">
                                                                                                <button class="btn btn-sm btn-primary" type="button">View</button> <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" type="button"><span class="caret"></span> <span class="sr-only">View profile</span></button>
                                                                                                <div class="dropdown-menu">
                                                                                                    <a class="dropdown-item" href="#">Follow</a>
                                                                                                    <a class="dropdown-item" href="#">Message</a>
                                                                                                    <a class="dropdown-item" href="#">Suggestion</a>
                                                                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end col-6 -->
                                                                            <div class="col-lg-6 col-md-12">
                                                                                <div class="card border shadow">
                                                                                    <div class="media card-body media-xs overflow-visible">
                                                                                        <a class="media-left" href="javascript:;"><img alt="" class="avatar avatar-md img-circle" src="assets/img/faces/female/5.jpg"></a>
                                                                                        <div class="media-body valign-middle">
                                                                                            <b class="text-inverse">Kenna Pride</b>
                                                                                        </div>
                                                                                        <div class="media-body valign-middle text-right overflow-visible">
                                                                                            <div class="btn-group">
                                                                                                <button class="btn btn-sm btn-primary" type="button">View</button> <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" type="button"><span class="caret"></span> <span class="sr-only">View profile</span></button>
                                                                                                <div class="dropdown-menu">
                                                                                                    <a class="dropdown-item" href="#">Follow</a>
                                                                                                    <a class="dropdown-item" href="#">Message</a>
                                                                                                    <a class="dropdown-item" href="#">Suggestion</a>
                                                                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end col-6 -->
                                                                            <div class="col-lg-6 col-md-12">
                                                                                <div class="card border shadow">
                                                                                    <div class="media card-body media-xs overflow-visible">
                                                                                        <a class="media-left" href="javascript:;"><img alt="" class="avatar avatar-md img-circle" src="assets/img/faces/female/6.jpg"></a>
                                                                                        <div class="media-body valign-middle">
                                                                                            <b class="text-inverse">Thu Dake</b>
                                                                                        </div>
                                                                                        <div class="media-body valign-middle text-right overflow-visible">
                                                                                            <div class="btn-group">
                                                                                                <button class="btn btn-sm btn-primary" type="button">View</button> <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" type="button"><span class="caret"></span> <span class="sr-only">View profile</span></button>
                                                                                                <div class="dropdown-menu">
                                                                                                    <a class="dropdown-item" href="#">Follow</a>
                                                                                                    <a class="dropdown-item" href="#">Message</a>
                                                                                                    <a class="dropdown-item" href="#">Suggestion</a>
                                                                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end col-6 -->
                                                                            <div class="col-lg-6 col-md-12">
                                                                                <div class="card border shadow">
                                                                                    <div class="media card-body media-xs overflow-visible">
                                                                                        <a class="media-left" href="javascript:;"><img alt="" class="avatar avatar-md img-circle" src="assets/img/faces/male/5.jpg"></a>
                                                                                        <div class="media-body valign-middle">
                                                                                            <b class="text-inverse">Trenton Tok</b>
                                                                                        </div>
                                                                                        <div class="media-body valign-middle text-right overflow-visible">
                                                                                            <div class="btn-group">
                                                                                                <button class="btn btn-sm btn-primary" type="button">View</button> <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" type="button"><span class="caret"></span> <span class="sr-only">View profile</span></button>
                                                                                                <div class="dropdown-menu">
                                                                                                    <a class="dropdown-item" href="#">Follow</a>
                                                                                                    <a class="dropdown-item" href="#">Message</a>
                                                                                                    <a class="dropdown-item" href="#">Suggestion</a>
                                                                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end col-6 -->
                                                                            <div class="col-lg-6 col-md-12">
                                                                                <div class="card border shadow">
                                                                                    <div class="media card-body media-xs overflow-visible">
                                                                                        <a class="media-left" href="javascript:;"><img alt="" class="avatar avatar-md img-circle" src="assets/img/faces/male/6.jpg"></a>
                                                                                        <div class="media-body valign-middle">
                                                                                            <b class="text-inverse">Elias Arboleda</b>
                                                                                        </div>
                                                                                        <div class="media-body valign-middle text-right overflow-visible">
                                                                                            <div class="btn-group">
                                                                                                <button class="btn btn-sm btn-primary" type="button">View</button> <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" type="button"><span class="caret"></span> <span class="sr-only">View profile</span></button>
                                                                                                <div class="dropdown-menu">
                                                                                                    <a class="dropdown-item" href="#">Follow</a>
                                                                                                    <a class="dropdown-item" href="#">Message</a>
                                                                                                    <a class="dropdown-item" href="#">Suggestion</a>
                                                                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end col-6 -->
                                                                            <div class="col-lg-6 col-md-12">
                                                                                <div class="card border shadow">
                                                                                    <div class="media card-body media-xs overflow-visible">
                                                                                        <a class="media-left" href="javascript:;"><img alt="" class="avatar avatar-md img-circle" src="assets/img/faces/female/7.jpg"></a>
                                                                                        <div class="media-body valign-middle">
                                                                                            <b class="text-inverse">Robertson</b>
                                                                                        </div>
                                                                                        <div class="media-body valign-middle text-right overflow-visible">
                                                                                            <div class="btn-group">
                                                                                                <button class="btn btn-sm btn-primary" type="button">View</button> <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" type="button"><span class="caret"></span> <span class="sr-only">View profile</span></button>
                                                                                                <div class="dropdown-menu">
                                                                                                    <a class="dropdown-item" href="#">Follow</a>
                                                                                                    <a class="dropdown-item" href="#">Message</a>
                                                                                                    <a class="dropdown-item" href="#">Suggestion</a>
                                                                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end col-6 -->
                                                                            <div class="col-lg-6 col-md-12">
                                                                                <div class="card border shadow">
                                                                                    <div class="media card-body media-xs overflow-visible">
                                                                                        <a class="media-left" href="javascript:;"><img alt="" class="avatar avatar-md img-circle" src="assets/img/faces/male/7.jpg"></a>
                                                                                        <div class="media-body valign-middle">
                                                                                            <b class="text-inverse">Sergio Silverio</b>
                                                                                        </div>
                                                                                        <div class="media-body valign-middle text-right overflow-visible">
                                                                                            <div class="btn-group">
                                                                                                <button class="btn btn-sm btn-primary" type="button">View</button> <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" type="button"><span class="caret"></span> <span class="sr-only">View profile</span></button>
                                                                                                <div class="dropdown-menu">
                                                                                                    <a class="dropdown-item" href="#">Follow</a>
                                                                                                    <a class="dropdown-item" href="#">Message</a>
                                                                                                    <a class="dropdown-item" href="#">Suggestion</a>
                                                                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end col-6 -->
                                                                            <div class="col-lg-6 col-md-12">
                                                                                <div class="card border shadow">
                                                                                    <div class="media card-body media-xs overflow-visible">
                                                                                        <a class="media-left" href="javascript:;"><img alt="" class="avatar avatar-md img-circle" src="assets/img/faces/female/9.jpg"></a>
                                                                                        <div class="media-body valign-middle">
                                                                                            <b class="text-inverse">Kathern</b>
                                                                                        </div>
                                                                                        <div class="media-body valign-middle text-right overflow-visible">
                                                                                            <div class="btn-group">
                                                                                                <button class="btn btn-sm btn-primary" type="button">View</button> <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" type="button"><span class="caret"></span> <span class="sr-only">View profile</span></button>
                                                                                                <div class="dropdown-menu">
                                                                                                    <a class="dropdown-item" href="#">Follow</a>
                                                                                                    <a class="dropdown-item" href="#">Message</a>
                                                                                                    <a class="dropdown-item" href="#">Suggestion</a>
                                                                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end col-6 -->
                                                                            <div class="col-lg-6 col-md-12">
                                                                                <div class="card border shadow">
                                                                                    <div class="media card-body media-xs overflow-visible">
                                                                                        <a class="media-left" href="javascript:;"><img alt="" class="avatar avatar-md img-circle" src="assets/img/faces/female/8.jpg"></a>
                                                                                        <div class="media-body valign-middle">
                                                                                            <b class="text-inverse">Melloney</b>
                                                                                        </div>
                                                                                        <div class="media-body valign-middle text-right overflow-visible">
                                                                                            <div class="btn-group">
                                                                                                <button class="btn btn-sm btn-primary" type="button">View</button> <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" type="button"><span class="caret"></span> <span class="sr-only">View profile</span></button>
                                                                                                <div class="dropdown-menu">
                                                                                                    <a class="dropdown-item" href="#">Follow</a>
                                                                                                    <a class="dropdown-item" href="#">Message</a>
                                                                                                    <a class="dropdown-item" href="#">Suggestion</a>
                                                                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div><!-- end col-6 -->
                                                                        </div><!-- end row -->
                                                                    </div><!-- end #profile-friends tab -->
                                                                </div><!-- end tab-content -->
                                                            </div><!-- end profile-content -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                                <div class="row">
                                                    <div class="col-lg-4 profile-image">
                                                        <div class="card shadow">
                                                            <img src="assets/img/photos/14.jpg" alt="gallery">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 profile-image">
                                                        <div class="card shadow">
                                                            <img src="assets/img/photos/19.jpg" alt="gallery">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 profile-image">
                                                        <div class="card shadow">
                                                            <img src="assets/img/photos/20.jpg" alt="gallery">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 profile-image">
                                                        <div class="card shadow">
                                                            <img src="assets/img/photos/4.jpg" alt="gallery">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 profile-image">
                                                        <div class="card shadow">
                                                            <img src="assets/img/photos/5.jpg" alt="gallery">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 profile-image">
                                                        <div class="card shadow">
                                                            <img src="assets/img/photos/6.jpg" alt="gallery">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 profile-image">
                                                        <div class="card shadow">
                                                            <img src="assets/img/photos/7.jpg" alt="gallery">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 profile-image">
                                                        <div class="card shadow">
                                                            <img src="assets/img/photos/8.jpg" alt="gallery">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 profile-image">
                                                        <div class="card shadow">
                                                            <img src="assets/img/photos/9.jpg" alt="gallery">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel" aria-labelledby="tabs-icons-text-4-tab">
                                                <div class="row profile ng-scope">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <form class="mt ng-pristine ng-valid" action="#">
                                                                <div class="form-group mb-0">
                                                                    <label class="sr-only" for="new-event">New event</label>
                                                                    <textarea class="form-control border-top-0 border-left-0 border-right-0 border-radius-0" id="new-event" placeholder="Post something..." rows="3"></textarea>
                                                                </div>
                                                                <div class="btn-toolbar">
                                                                    <div class="btn-group"><a href="#" class="btn btn-sm btn-gray"><i class="fa fa-camera fa-lg"></i></a> <a href="#" class="btn btn-sm btn-gray"><i class="fa fa-map-marker fa-lg"></i></a>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-danger btn-sm pull-right">Post</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="activities">
                                                            <section class="event card shadow">
                                                                <div class="d-flex">
                                                                    <span class="thumb-sm avatar pull-left mr-sm"><img class="img-circle" src="assets/img/faces/female/32.jpg" alt="..."></span>
                                                                    <div >
                                                                        <h4 class="event-heading"><a href="#">John doe</a> <small><a href="#">@nils</a></small></h4>
                                                                        <p class="text-xs text-muted">February 22, 2014 at 01:59 PM</p>
                                                                    </div>
                                                                </div>
                                                                <p class="text-sm mb-0">There is no such thing as maturity. There is instead an ever-evolving process of maturing. Because when there is a maturity, there is ...</p>
                                                                <footer>
                                                                    <ul class="post-links">
                                                                        <li><a href="#">1 hour</a>
                                                                        </li>
                                                                        <li><a href="#"><span class="text-danger"><i class="fa fa-heart"></i> Like</span></a>
                                                                        </li>
                                                                        <li><a href="#">Comment</a>
                                                                        </li>
                                                                    </ul>
                                                                </footer>
                                                            </section>
                                                            <section class="event card shadow">
                                                                <h4 class="event-heading"><a href="#">john doe</a> <small>@jess</small></h4>
                                                                <p class="text-xs text-muted">February 22, 2014 at 01:59 PM</p>
                                                                <p class="text-sm mb-0">Check out this awesome photo I made in Italy last summer. Seems it was lost somewhere deep inside my brand new HDD 40TB. Thanks god I found it!</p>
                                                                <footer>
                                                                    <div class="clearfix">
                                                                        <ul class="post-links mt-sm pull-left pb-2">
                                                                            <li><a href="#">1 hour</a>
                                                                            </li>
                                                                            <li><a href="#"><span class="text-danger"><i class="fa fa-heart-o"></i> Like</span></a>
                                                                            </li>
                                                                            <li><a href="#">Comment</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <ul class="post-comments mt-sm mb-0">
                                                                        <li class="d-flex"><span class="thumb-sm avatar float-left mr-sm "><img class="img-circle" src="assets/img/faces/female/32.jpg" alt="..."></span>
                                                                            <div class="comment-body">
                                                                                <h6 class="author fw-semi-bold">Ignacio Abad <small>6 mins ago</small></h6>
                                                                                <p class="text-xs">Hey, have you heard anything about that?</p>
                                                                            </div>
                                                                        </li>
                                                                        <li><span class="thumb-sm avatar float-left mr-sm"><img class="img-circle" src="assets/img/faces/female/2.jpg" alt="..."></span>
                                                                            <div class="comment-body">
                                                                                <input class="form-control input-sm" type="text" placeholder="Write your comment...">
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </footer>
                                                            </section>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tabs-icons-text-5" role="tabpanel" aria-labelledby="tabs-icons-text-5-tab">
                                                <p>Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                                                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus</p>
                                                <p class="mb-4">because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
                                            </div>
                                        </div>
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
