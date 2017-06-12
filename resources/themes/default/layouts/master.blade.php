<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-US"> <!--<![endif]-->
<head>

    @include('partials.head')

</head>


<body>
@include('partials.vars')

@include('partials.loader')

@include('partials.header')

@yield('content')

@include('partials.footer')

@include('partials.alert')
<!-- Js -->
@include('partials.scripts')
<!-- End Js -->

</body>
</html>