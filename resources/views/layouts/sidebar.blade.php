<!-- Top Bar Start -->
<div class="topbar">

<nav class="navbar-custom">
    <!-- Search input -->
    <div class="search-wrap" id="search-wrap">
        <div class="search-bar">
            <input class="search-input" type="search" placeholder="Search" />
            <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                <i class="mdi mdi-close-circle"></i>
            </a>
        </div>
    </div>

    <ul class="list-inline float-right mb-0">
        <!-- Search -->
        <li class="list-inline-item dropdown notification-list">
            <a class="nav-link waves-effect toggle-search" href="#"  data-target="#search-wrap">
                <i class="mdi mdi-magnify noti-icon"></i>
            </a>
        </li>
        <!-- Fullscreen -->
        <li class="list-inline-item dropdown notification-list hidden-xs-down">
            <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                <i class="mdi mdi-fullscreen noti-icon"></i>
            </a>
        </li>
        <!-- language-->
        <li class="list-inline-item dropdown notification-list hidden-xs-down">
            <a class="nav-link dropdown-toggle arrow-none waves-effect text-muted" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                English <img src="{{ URL::asset('assets/images/flags/us_flag.jpg') }}" class="ml-2" height="16" alt=""/>
            </a>
            <div class="dropdown-menu dropdown-menu-right language-switch">
                <a class="dropdown-item" href="#"><img src="{{ URL::asset('assets/images/flags/germany_flag.jpg') }}" alt="" height="16"/><span> German </span></a>
                <a class="dropdown-item" href="#"><img src="{{ URL::asset('assets/images/flags/italy_flag.jpg') }}" alt="" height="16"/><span> Italian </span></a>
                <a class="dropdown-item" href="#"><img src="{{ URL::asset('assets/images/flags/french_flag.jpg') }}" alt="" height="16"/><span> French </span></a>
                <a class="dropdown-item" href="#"><img src="{{ URL::asset('assets/images/flags/spain_flag.jpg') }}" alt="" height="16"/><span> Spanish </span></a>
                <a class="dropdown-item" href="#"><img src="{{ URL::asset('assets/images/flags/russia_flag.jpg') }}" alt="" height="16"/><span> Russian </span></a>
            </div>
        </li>
        <!-- notification-->
        <li class="list-inline-item dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <i class="ion-ios7-bell noti-icon"></i>
                <span class="badge badge-danger noti-icon-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5>Notification (3)</h5>
                </div>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                    <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                    <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                </a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                    <p class="notify-details"><b>New Message received</b><small class="text-muted">You have 87 unread messages</small></p>
                </a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="notify-icon bg-info"><i class="mdi mdi-martini"></i></div>
                    <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                </a>

                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    View All
                </a>
            </div>
        </li>
        <!-- User-->
        <li class="list-inline-item dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <img src="{{ URL::asset('assets/images/users/avatar-1.jpg') }}" alt="user" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted"></i> My Wallet</a>
                <a class="dropdown-item" href="#"><span class="badge badge-success pull-right m-t-5">5</span><i class="dripicons-gear text-muted"></i> Settings</a>
                <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted"></i> Lock screen</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="dripicons-exit text-muted"></i> Logout</a>
            </div>
        </li>
    </ul>
    <!-- Page title -->
    <ul class="list-inline menu-left mb-0">
        <li class="list-inline-item">
            <button type="button" class="button-menu-mobile open-left waves-effect">
                <i class="ion-navicon"></i>
            </button>
        </li>
        <li class="hide-phone list-inline-item app-search">
            @yield('breadcrumb') 
        </li>
    </ul>
    <div class="clearfix"></div>
</nav>
</div>
<!-- Top Bar End -->