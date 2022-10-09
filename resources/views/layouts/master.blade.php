<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    <title>@yield('title', 'defualt title')</title>

    <link href="{{ URL::asset('assets/plugins/treeview/treeview.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <!--Internal  treeview -->
    @include('layouts.head')
</head>

<body class="main-body app sidebar-mini">
    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ URL::asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->
    @include('layouts.main-sidebar')
    <!-- main-content -->
    <div class="main-content app-content">
        @include('layouts.main-header')
        <!-- container -->
        <div class="container-fluid">
            @yield('page-header')
            @yield('content')
            @include('layouts.sidebar')
            @include('layouts.models')
            @include('layouts.footer')
            @include('layouts.footer-scripts')
            <script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
            <!--Internal  Notify js -->
            <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
            @if (Session::has('error'))

                <script>
                    notif({
                        type: "error",
                        msg: "<b>خطاء: </b>. هناك خطاء  يرجي المحاوله مجددا ",
                        position: "center",
                        autohide: false
                    });

                </script>
            @endif
            @if (Session::has('success'))
                <script>
                    notif({
                        type: "success",
                        msg: "<b>نجاح: </b>. تمت العمليه بنجاح",
                        position: "center",
                        autohide: false
                    });

                </script>
            @endif

</body>

</html>
