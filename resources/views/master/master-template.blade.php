<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


    <!-- #CSS Links -->
    @include('master.full-css')
            <!--================================================== -->

</head>
<body class="menu-on-top smart-style-2">
@include('master.header')

@if(!Auth::guest())
@include('master.navigation')
@endif
        <!-- #BODY -->
{{--<div style="padding-top: 85px;">--}}
<div id="main" role="main">
    <div id="content">
        @include('master.error')
        @yield('content')
    </div>
</div>
<!-- #JS Links -->
@include('master.full-js')
        <!--================================================== -->
@yield('additional-js')

</body>
</html>
