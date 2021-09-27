<!doctype html>
<html lang="en">
<head>
    @include('Admin.includes.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    @include('Admin.includes.navbar')
    @include('Admin.includes.header')
    @yield('content')
    @include('Admin.includes.footer')
</div>
    @include('Admin.includes.scripts')
</body>
</html>
