<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">

    <meta http-equiv=”X-UA-Compatible” content=”IE=EmulateIE9”>
    <meta http-equiv=”X-UA-Compatible” content=”IE=9”>
    <title>@yield('title','BucketAdmin')</title>
    @include('user::partial.css')
    @stack('css')
</head>
<body>
<section id="container">
    
    <!--header start-->
    @include('user::partial.header')
    <!--header end-->

    <!--sidebar start-->
    @include('user::partial.aside')
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            @yield('content')
        </section>
    </section>
    <!--main content end-->

    <!--right sidebar start-->
    @include('user::partial.right-sidebar')
    <!--right sidebar end-->
</section>
@include('user::partial.js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@stack('js')

</body>
</html>