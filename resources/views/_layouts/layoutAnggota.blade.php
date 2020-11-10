<!DOCTYPE html>
<html lang="en">
@php 
    $subdomain = Route::input('cu'); 
    if($subdomain){
        $cu = App\Cu::where('slug',$subdomain)->first();
        $cu->id;
    }
@endphp 
<head>
    <meta charset="utf-8">
    <!-- Viewport Meta Tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    @if($subdomain)        
        CU {{ $cu->name }} - Puskopdit BKCU Kalimantan
    @else
        Puskopdit BKCU Kalimantan
    @endif    
    </title>

    <!-- icon -->
    <link rel="icon" href="{{asset('images/logo.png')}}" sizes="16x16">
    <link rel="icon" href="{{asset('images/logo.png')}}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{asset('images/logo.png')}}" />
    <link rel="apple-touch-icon" href="{{asset('images/logo.png')}}" sizes="76x76" />
    <link rel="apple-touch-icon" href="{{asset('images/logo.png')}}" sizes="120x120" />
    <link rel="apple-touch-icon" href="{{asset('images/logo.png')}}" sizes="152x152" />
    <link rel="apple-touch-icon" href="{{asset('images/logo.png')}}" sizes="180x180" />
    
    <!-- seo -->
    {!! SEO::generate(true) !!}
    
    <!-- css -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/public/libs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/public/myStyle.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="dashboard_assets/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="dashboard_assets/style.css" type="text/css" />
    <link rel="stylesheet" href="dashboard_assets/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="dashboard_assets/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="dashboard_assets/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="dashboard_assets/css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="dashboard_assets/css/calendar.css" type="text/css" />

	<link rel="stylesheet" href="css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- fonts -->
    <link rel="stylesheet" href="{{ asset('css/public/font-icons.css') }}">

    <!-- external css -->
    @yield('css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
    </script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js">
    </script>
    <![endif]-->
</head>
<body class="no-transition" style="background-image: url({{ asset('images/patterns/default.png') }}); background-attachment: fixed;">

    <!-- wrapper -->
    <div id="wrapper" class="clearfix">

        <!-- header -->
       @include('_layouts.headerAnggota')

        <!-- content -->
        @yield('content')

        <!-- footer -->
        @if($subdomain)
            @include('_layouts.footerCu')
        @else
            @include('_layouts.footer')
        @endif
        
    </div>

    <!-- go to top -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- js -->
    <script src="{{ URL::asset('js/public/libs.js') }}"></script>

    <!-- external js -->
    @yield('js')

</body>
</html>