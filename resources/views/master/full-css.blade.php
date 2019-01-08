    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{URL::asset('SmartAdmin_HTML_Version/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{URL::asset('SmartAdmin_HTML_Version/css/font-awesome.min.css')}}">


    <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{URL::asset('SmartAdmin_HTML_Version/css/smartadmin-production-plugins.min.css')}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{URL::asset('SmartAdmin_HTML_Version/css/smartadmin-production.min.css')}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{URL::asset('SmartAdmin_HTML_Version/css/smartadmin-skins.min.css')}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    <!-- SmartAdmin RTL Support -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{URL::asset('SmartAdmin_HTML_Version/css/smartadmin-rtl.min.css')}}">

    <!-- #FAVICONS -->
    <link rel="shortcut icon" href="{{URL::asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{URL::asset('favicon.ico')}}" type="image/x-icon">

    <!-- #GOOGLE FONT -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

    <!-- #APP SCREEN / ICONS -->
    <!-- Specifying a Webpage Icon for Web Clip
         Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
    <link rel="apple-touch-icon" href="{{URL::asset('SmartAdmin_HTML_Version/img/splash/sptouch-icon-iphone.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('SmartAdmin_HTML_Version/img/splash/touch-icon-ipad.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{URL::asset('SmartAdmin_HTML_Version/img/splash/touch-icon-iphone-retina.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{URL::asset('SmartAdmin_HTML_Version/img/splash/touch-icon-ipad-retina.png')}}">

    <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Startup image for web apps -->
    <link rel="apple-touch-startup-image" href="{{URL::asset('SmartAdmin_HTML_Version/img/splash/ipad-landscape.png')}}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
    <link rel="apple-touch-startup-image" href="{{URL::asset('SmartAdmin_HTML_Version/img/splash/ipad-portrait.png')}}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
    <link rel="apple-touch-startup-image" href="{{URL::asset('SmartAdmin_HTML_Version/img/splash/iphone.png')}}" media="screen and (max-device-width: 320px)">
    <style>
        .smart-style-2.menu-on-top aside#left-panel nav>ul>li:hover {
            background-color: #fc4543 !important;
            border-right: 1px solid #fc4543;
            border-left: 1px solid #fc4543;
        }
        nav>ul>li.active {
            background: none !important;
            background-color: #fc4543 !important;
            border-right: none;
            border-left: none;
            color: white;
        }

        .menu-on-top aside#left-panel nav {
            height: auto !important;
        }

        .smart-style-2.menu-on-top aside#left-panel nav>ul>li>ul {
            left: -1px;
            background-color: #772220 !important;
        }

        .smart-style-2.menu-on-top aside#left-panel nav>ul>li:hover>a {
            border-right: 1px solid #fc4543;
            border-left: 1px solid #fc4543;
        }
        .active span {
            color: white;
        }
        .active i {
            color: white;
        }

        @font-face {
            font-family: GothamMedium;
            src: url("{{URL::asset('Fonts/GothamMedium.ttf')}}");
        }
        @font-face {
            font-family: GothamBook;
            src: url("{{URL::asset('Fonts/GothamBook.ttf')}}");
        }
        @font-face {
            font-family: GothamBold;
            src: url("{{URL::asset('Fonts/GothamBold.ttf')}}");
        }

        body {
            font-family: GothamBook;
        }

    </style>