<!doctype html>
<html lang="en">
<head>

    @include('partials.meta')

    @include('partials.styles')

</head>
<body>
<div class="container">
    {!! LaravelLocalization::getCurrentLocale() !!}
    <div class="pull-right">
        {!! Widget::widget__menu() !!}
        <a href="{!! route('home') !!}">Дом</a>
        <a href="/ua">@lang('labels.ua')</a>
        <a href="/ru">@lang('labels.ru')</a>
        <a href="/en">@lang('labels.en')</a>
    </div>
</div>

    @yield('container')

    @include('partials.scripts')
    <script>
        $('.swipebox').swipebox();
    </script>
</body>
</html>