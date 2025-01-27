<nav class="navbar navbar-top  navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>

        <!-- Horizontal Navbar -->
        <ul class="navbar-nav align-items-center d-none d-xl-block">
            <li class="nav-item dropdown">
            <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0 mr-md-2 pl-1 d-lg-block" data-toggle="dropdown" href="#" role="button">
                Help
            </a>
            </li>
            <li class="nav-item dropdown ">
                <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0 mr-md-2 pl-1 d-lg-block" data-toggle="dropdown" href="#" role="button">
                    Mail <span class="badge badge-yellow badge-circle badge-sm h-5 w-5 text-xs">4</span>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right ">
                    <a href="#" class="dropdown-item d-flex text-center">
                        Mail Box
                    </a>
                    <a href="#" class="dropdown-item d-flex text-center">
                        Compose mail
                    </a>
                    <a href="#" class="dropdown-item d-flex text-center">
                        Seperated Link
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item text-center">View all Notification</a>
                </div>
            </li>
        </ul>

        <!-- Brand -->
        <a class="navbar-brand pt-0 d-md-none" href="index.html">
            <img src="/assets/img/brand/logo-dark.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- Form -->
        <div class="navbar-search navbar-search-dark form-inline ml-3 mr-lg-auto" disabled>
            <div class="form-group mb-0">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search" onclick="javascript:searchProfile();"></i></span>
                    </div><input id="searchQ" name="searchQ" class="form-control" placeholder="Search" type="text" onkeydown="javascript:searchKeyProfile();">
                </div>
            </div>
        </div>
        <!-- User -->
        <!-- User -->
        <ul class="navbar-nav align-items-center ">
            <li class="nav-item dropdown">
                <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0 mr-md-2 pl-1" data-toggle="dropdown" href="#" role="button">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle"><img alt="Image placeholder" src="/assets/img/faces/female/27.jpg"></span>

                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title text-center border-bottom pb-3">
                            <h3 class="text-capitalize text-dark mb-1">Luna Klippel</h3>
                        <h6 class="text-overflow m-0">Administrator</h6>
                    </div>
                    <a class="dropdown-item" href="user-profile.html"><i class="ni ni-single-02"></i> <span>My profile</span></a>
                    <a class="dropdown-item" href="#"><i class="ni ni-settings-gear-65"></i> <span>Settings</span></a>
                    <a class="dropdown-item" href="#"><i class=" ni ni-email-83"></i> <span>Chat</span></a>
                    <a class="dropdown-item" href="#"><i class=" ni ni-single-02"></i> <span>Friends</span></a>
                    <a class="dropdown-item" href="#"><i class="ni ni-calendar-grid-58"></i> <span>Activity</span></a>
                    <a class="dropdown-item" href="#"><i class="ni ni-support-16"></i> <span>Support</span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="ni ni-user-run"></i> <span>Logout</span></a>
                </div>
            </li>
            <li class="nav-item dropdown d-none d-md-flex">
                <a aria-expanded="false" aria-haspopup="true" title="languages" class="nav-link pr-0" data-toggle="dropdown" href="#" role="button">
                <div class="media align-items-center">
                    <i class="fe fe-flag f-30 "></i>
                </div></a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-arrow dropdown-menu-right"><a href="#" class="dropdown-item d-flex align-items-center">
                        <img src="/assets/img/flag-img/french_flag.jpg" alt="flag-img" class="avatar avatar-sm mr-3 align-self-center">
                        <div>
                            <strong>French</strong>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex align-items-center">
                        <img src="/assets/img/flag-img/germany_flag.jpg" alt="flag-img" class="avatar avatar-sm mr-3 align-self-center">
                        <div>
                            <strong>Germany</strong>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex align-items-center">
                        <img src="/assets/img/flag-img/italy_flag.jpg" alt="flag-img" class="avatar avatar-sm  mr-3 align-self-center">
                        <div>
                            <strong>Italy</strong>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex align-items-center">
                        <img src="/assets/img/flag-img/russia_flag.jpg" alt="flag-img" class="avatar avatar-sm mr-3 align-self-center">
                        <div>
                            <strong>Russia</strong>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex align-items-center">
                        <img src="/assets/img/flag-img/spain_flag.jpg" alt="flag-img" class="avatar avatar-sm mr-3 align-self-center">
                        <div>
                            <strong>Spain</strong>
                        </div>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown d-none d-md-flex">
                <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-0" data-toggle="dropdown" href="#" role="button">
                <div class="media align-items-center">
                    <i class="fe fe-bell f-30 "></i>
                </div></a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-arrow dropdown-menu-right">
                    <a href="#" class="dropdown-item d-flex">
                        <div>
                            <strong>Someone likes our posts.</strong>
                            <div class="small text-muted">3 hours ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                        <div>
                            <strong> 3 New Comments</strong>
                            <div class="small text-muted">5  hour ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                        <div>
                            <strong> Server Rebooted.</strong>
                            <div class="small text-muted">45 mintues ago</div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item text-center">View all Notification</a>
                </div>
            </li>
            <li class="nav-item d-none d-md-flex">
                <div class="dropdown d-none d-md-flex mt-2 ">
                    <a class="nav-link full-screen-link  pr-0"><i class="fe fe-maximize-2 floating " id="fullscreen-button"></i></a>
                </div>
            </li>
        </ul>
    </div>
    <form id="logout-form" action="/logout" method="POST" style="display: none;">
        @csrf
    </form>
</nav>
