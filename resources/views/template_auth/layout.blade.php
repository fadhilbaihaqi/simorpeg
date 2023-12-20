<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    <!-- Title -->
    <title>@yield('title', 'Login Page')</title>

    <!--- Favicon --->
    <link rel="icon" href="{{ asset('') }}assets/img/brand/favicon.png" type="image/x-icon" />

    <!--- Icons css --->
    <link href="{{ asset('') }}assets/css/icons.css" rel="stylesheet">

    <!--- Right-sidemenu css --->
    <link href="{{ asset('') }}assets/plugins/sidebar/sidebar.css" rel="stylesheet">

    <!--- Custom Scroll bar --->
    <link href="{{ asset('') }}assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" />

    <!--- Style css --->
    <link href="{{ asset('') }}assets/css/style.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/css/skin-modes.css" rel="stylesheet">

    <!--- Sidemenu css --->
    <link href="{{ asset('') }}assets/css/sidemenu.css" rel="stylesheet">

    <!--- Animations css --->
    <link href="{{ asset('') }}assets/css/animate.css" rel="stylesheet">

</head>

<body class="main-body bg-light">

    <!-- Loader -->

    <div id="global-loader">
        <img src="{{ asset('') }}assets/img/loaders/loader-4.svg" class="loader-img" alt="Loader">
    </div>

    <!-- /Loader -->
    @yield('content')


    <!--- JQuery min js --->
    <script src="{{ asset('') }}assets/plugins/jquery/jquery.min.js"></script>

    <!--- Bootstrap Bundle js --->
    <script src="{{ asset('') }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!--- Ionicons js --->
    <script src="{{ asset('') }}assets/plugins/ionicons/ionicons.js"></script>

    <!--- Moment js --->
    <script src="{{ asset('') }}assets/plugins/moment/moment.js"></script>

    <!--- Eva-icons js --->
    <script src="{{ asset('') }}assets/js/eva-icons.min.js"></script>

    <!--- Rating js --->
    <script src="{{ asset('') }}assets/plugins/rating/jquery.rating-stars.js"></script>
    <script src="{{ asset('') }}assets/plugins/rating/jquery.barrating.js"></script>

    <!--- Index js --->
    <script src="{{ asset('') }}assets/js/script.js"></script>

    <!--- Custom js --->
    <script src="{{ asset('') }}assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>

</body>

</html>
