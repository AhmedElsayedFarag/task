<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <title>AiiShAii</title>
    <link rel="apple-touch-icon" href="{{asset('img/footer-logo.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/footer-logo.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/tether-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/shepherd-theme-default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/forms/select/select2.min.css')}}">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/core/menu/menu-types/horizontal-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/dashboard-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/card-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/plugins/tour/tour.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
    <div class="navbar-header d-xl-block d-none">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item"><a class="navbar-brand" href="{{route('dashboard')}}">
                    <div class="brand-logo"></div>
                </a></li>
        </ul>
    </div>
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
{{--                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon feather icon-check-square"></i></a></li>--}}
{{--                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon feather icon-message-square"></i></a></li>--}}
{{--                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon feather icon-mail"></i></a></li>--}}
{{--                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calender.html" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon feather icon-calendar"></i></a></li>--}}
                    </ul>
{{--                    <ul class="nav navbar-nav">--}}
{{--                        <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon feather icon-star warning"></i></a>--}}
{{--                            <div class="bookmark-input search-input">--}}
{{--                                <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>--}}
{{--                                <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="0" data-search="template-list">--}}
{{--                                <ul class="search-list search-list-bookmark"></ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </div>
                <ul class="nav navbar-nav float-right">
{{--                    <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language">English</span></a>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a class="dropdown-item" href="#" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></div>--}}
{{--                    </li>--}}
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>

{{--                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">5</span></a>--}}
{{--                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">--}}
{{--                            <li class="dropdown-menu-header">--}}
{{--                                <div class="dropdown-header m-0 p-2">--}}
{{--                                    <h3 class="white">5 New</h3><span class="notification-title">App Notifications</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">--}}
{{--                                    <div class="media d-flex align-items-start">--}}
{{--                                        <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me tonight?</small>--}}
{{--                                        </div><small>--}}
{{--                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>--}}
{{--                                    </div>--}}
{{--                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">--}}
{{--                                    <div class="media d-flex align-items-start">--}}
{{--                                        <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="success media-heading red darken-1">99% Server load</h6><small class="notification-text">You got new order of goods.</small>--}}
{{--                                        </div><small>--}}
{{--                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>--}}
{{--                                    </div>--}}
{{--                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">--}}
{{--                                    <div class="media d-flex align-items-start">--}}
{{--                                        <div class="media-left"><i class="feather icon-alert-triangle font-medium-5 danger"></i></div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="danger media-heading yellow darken-3">Warning notifixation</h6><small class="notification-text">Server have 99% CPU usage.</small>--}}
{{--                                        </div><small>--}}
{{--                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time></small>--}}
{{--                                    </div>--}}
{{--                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">--}}
{{--                                    <div class="media d-flex align-items-start">--}}
{{--                                        <div class="media-left"><i class="feather icon-check-circle font-medium-5 info"></i></div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="info media-heading">Complete the task</h6><small class="notification-text">Cake sesame snaps cupcake</small>--}}
{{--                                        </div><small>--}}
{{--                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>--}}
{{--                                    </div>--}}
{{--                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">--}}
{{--                                    <div class="media d-flex align-items-start">--}}
{{--                                        <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i></div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="warning media-heading">Generate monthly report</h6><small class="notification-text">Chocolate cake oat cake tiramisu marzipan</small>--}}
{{--                                        </div><small>--}}
{{--                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>--}}
{{--                                    </div>--}}
{{--                                </a></li>--}}
{{--                            <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{auth()->user()->first_name}}</span><span class="user-status">Available</span></div><span><img class="round" src="{{asset(auth()->user()->image)}}" alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('admin.editProfile')}}"><i class="feather icon-user"></i> Edit Profile</a>
{{--                            <a class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> My Inbox</a>--}}
{{--                            <a class="dropdown-item" href="app-todo.html"><i class="feather icon-check-square"></i> Task</a>--}}
{{--                            <a class="dropdown-item" href="app-chat.html"><i class="feather icon-message-square"></i> Chats</a>--}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    class="feather icon-power"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('dashboard')}}">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0"></h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <!-- include ../../../includes/mixins-->
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item {{(url()->current() == route('dashboard'))?'active':''}}"><a class="nav-link" href="{{route('dashboard')}}"><i class="feather icon-home"></i><span data-i18n="Dashboard">Dashboard</span></a></li>
                @can('users')
                <li class="nav-item {{(url()->current() == route('admin.users.index'))?'active':''}}"><a class="nav-link" href="{{route('admin.users.index')}}"><i class="feather icon-users"></i>Users</a></li>
                @endcan
                @can('categories')
                <li class="nav-item {{(url()->current() == route('admin.categories.index'))?'active':''}}"><a class="nav-link" href="{{route('admin.categories.index')}}"><i class="feather icon-package"></i><span>Categories</span></a></li>
                @endcan
                @can('options')
                <li class="nav-item {{(url()->current() == route('admin.options.index'))?'active':''}}"><a class="nav-link" href="{{route('admin.options.index')}}"><i class="feather icon-package"></i><span>Options</span></a></li>
                @endcan
                @can('ads')
                <li class="nav-item {{(url()->current() == route('admin.ads.index'))?'active':''}}"><a class="nav-link" href="{{route('admin.ads.index')}}"><i class="feather icon-package"></i><span>Ads</span></a></li>
                @endcan
                @can('reports')
                <li class="nav-item {{(url()->current() == route('admin.reports.index'))?'active':''}}"><a class="nav-link" href="{{route('admin.reports.index')}}"><i class="feather icon-package"></i><span>Reports</span></a></li>
                @endcan
                @can('notifications')
                <li class="nav-item {{(url()->current() == route('admin.notifications.index'))?'active':''}}"><a class="nav-link" href="{{route('admin.notifications.index')}}"><i class="feather icon-package"></i><span>Notifications</span></a></li>
                @endcan
                @can('settings')
                <li class="nav-item {{(url()->current() == route('admin.settings.index'))?'active':''}}"><a class="nav-link" href="{{route('admin.settings.index')}}"><i class="feather icon-package"></i><span>Settings</span></a></li>
                @endcan
                @can('activity_log')
                <li class="nav-item {{(url()->current() == route('admin.log'))?'active':''}}"><a class="nav-link" href="{{route('admin.log')}}"><i class="feather icon-package"></i><span>Activity log</span></a></li>
                @endcan
                @if(auth()->user()->hasAnyRole(1))
                <li class="nav-item {{(url()->current() == route('admin.permissions.index'))?'active':''}}"><a class="nav-link" href="{{route('admin.permissions.index')}}"><i class="feather icon-package"></i><span>Permissions</span></a></li>
                @endif

            </ul>
        </div>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            @yield('content')

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light navbar-shadow">
    <p class="clearfix blue-grey lighten-2 mb-0">
        <span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; {{date('Y')}}, All rights Reserved</span>
        <span class="float-md-right d-none d-md-block">Developed By <a
                href="https://www.arageeks.com/">AraGeeks</a></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('admin/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('admin/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/extensions/tether.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/extensions/shepherd.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>

<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('admin/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('admin/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('admin/app-assets/js/scripts/components.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('admin/app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
<script src="{{asset('admin/app-assets/js/scripts/datatables/datatable.js')}}"></script>
<script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
<script src="{{asset('admin/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="https://cdn.tiny.cloud/1/wfpnmtuhr72rq83u3ac7g2yrxnujpieg0c2dxieie58uoyml/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@yield('script')
<!-- END: Page JS-->
<script>
    @if(\Illuminate\Support\Facades\Session::has('message'))
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{\Illuminate\Support\Facades\Session::get('message')}}',
        showConfirmButton: false,
        timer: 1500
    });
    @endif
    function fireDeleteEvent(id) {
        console.log(id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                );
                $('#form-' + id).submit();
            }
        })
    }//end fireDeleteEvent
</script>
</body>
<!-- END: Body-->

</html>
