<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>{{!empty($title) ?$title : config('app.name')}}</title>
    @include('admin.includes.css')
    @stack('css')
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<!-- fixed-top-->
@include('admin.includes.header')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            @yield('content_header')
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
@include('admin.includes.footer')
@include('admin.includes.js')
@stack('js')

</body>
</html>
