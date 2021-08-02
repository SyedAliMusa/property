<!doctype html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class=""> <!--<![endif]-->
<head>
    @include('frontEnd.includes.head')
</head>
<body data-offset="200" data-spy="scroll" data-target=".primary-navigation">
    @include('frontEnd.includes.header')
    @yield('content')
    @include('frontEnd.includes.footer')
    @include('frontEnd.includes.scripts')
</body>
</html>
