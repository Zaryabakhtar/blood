<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $title ?? 'Blood Donation' }}</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('panel/media/logos/favicon.ico') }}" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--begin::Global Theme Styles(used by all pages) -->
        <link href="{{ asset('panel/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('panel/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->
    <!--begin::Layout Skins(used by all pages) -->
		<link href="{{ asset('panel/css/skins/header/base/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('panel/css/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('panel/css/skins/brand/dark.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('panel/css/skins/aside/dark.css') }}" rel="stylesheet" type="text/css" />
		
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Layout Skins -->
    @stack('customCSS')
</head>
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
        @if(auth()->user())
            @include('layouts.mobile_header')
        @endif
    <div id="app" class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            @if(auth()->user())
                @include('layouts.aside')
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                    @include('layouts.dashboard_header')
                    <div class="kt-space-20"></div>
                    @yield('content')
                </div>
            @else
                @yield('content')
            @endif
        </div>
    </div>

    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": [
                        "#c5cbe3",
                        "#a1a8c3",
                        "#3d4465",
                        "#3e4466"
                    ],
                    "shape": [
                        "#f0f3ff",
                        "#d9dffa",
                        "#afb4d4",
                        "#646c9a"
                    ]
                }
            }
        };
    </script>

    <!--begin::Global Theme Bundle(used by all pages) -->
            <script src="{{ asset('panel/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
            <script src="{{ asset('panel/js/scripts.bundle.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/functions.js') }}" type="text/javascript"></script>
            <script>
                $('.kt-select2').select2();
                $('.kt-datepicker').datepicker({
                    rtl: KTUtil.isRTL(),
                    todayHighlight: true,
                    orientation: "bottom left",
                    format : 'yyyy-mm-dd'
                });
                $('.validNumber').inputmask('decimal' , {
                    numericInput: false
                });
            </script>
    <!--end::Global Theme Bundle -->
    @stack('customJS')
</body>
</html>
