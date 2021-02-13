<link rel="apple-touch-icon" href="{{asset('admin/assets')}}/app-assets/images/ico/apple-icon-120.png">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets')}}/app-assets/images/ico/favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
      rel="stylesheet">
<link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
      rel="stylesheet">
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/app-assets/css/vendors.css">
<!-- END VENDOR CSS-->
<!-- BEGIN MODERN CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/app-assets/css/app.css">
<!-- END MODERN CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/app-assets/css/core/colors/palette-gradient.css">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/app-assets/fonts/simple-line-icons/style.css">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/app-assets/css/core/colors/palette-gradient.css">
<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/assets/css/style.css">
<!-- END Custom CSS-->
<link href="http://fonts.cdnfonts.com/css/cairo-2" rel="stylesheet">


<style>

    #myTable_next, myTable_previous {

        margin: 10px !important;
    }


</style>

@if(app()->getLocale()=='ar')

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/app-assets/css-rtl/vendors.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/app-assets/css-rtl/app.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/app-assets/css-rtl/custom-rtl.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/app-assets/css-rtl/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/app-assets/css-rtl/core/colors/palette-gradient.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/assets/css/style-rtl.css">
    <style>


        body, h1, h2, h3, h4, span, div, li {
            font-family: 'Cairo', Sans-Serif !important;

        }


        body.vertical-layout.vertical-menu-modern.menu-expanded .content,
        body.vertical-layout.vertical-menu-modern.menu-expanded .footer {
            margin-left: 0;
        }

        body.vertical-layout.vertical-menu-modern.menu-expanded .content,
        body.vertical-layout.vertical-menu-modern.menu-expanded .footer {
            margin-left: 0;
        }

        body.vertical-layout.vertical-menu-modern.menu-expanded .navbar .navbar-container {
            margin-left: 0;
        }

    </style>
@endif
{{--End If--}}
