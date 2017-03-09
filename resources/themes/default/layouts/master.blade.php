<!DOCTYPE html>
<html lang="{!! LaravelLocalization::getCurrentLocale() !!}">
<head>
    @include('partials.meta')
    @include('partials.styles.template-'.$dashboard->template)
    <!--    Scripts     -->
    @include('partials.scripts.template-'.$dashboard->template)
</head>
<body>

@include('partials.header.template-'.$dashboard->template)

@yield('content')

@include('partials.footer.template-'.$dashboard->template)

</body>
</html>