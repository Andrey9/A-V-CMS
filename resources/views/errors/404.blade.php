<!DOCTYPE html>
<html lang="en">
<head>
    <title>@lang('labels.error') 404!</title>
    @include('partials.styles.template-1')
</head>
<body>

<div class="page">
    <div class="container">
        <div class="text">
            <h1>@lang('labels.error') 404!</h1>
            <h2>@lang('labels.page') @lang('labels.not_found')!</h2>
            <a href="{!! route('home') !!}"><h4>@lang('labels.to_home_page')</h4></a>
        </div>
    </div>
</div>
<style>
    body{
        background: #daffff;
    }
    .text{
        height: 100px;
        width: 400px;
        margin: 0 auto;
        text-align: center;
        margin-top: 150px;
    }
</style>

<!--    Scripts     -->
@include('partials.scripts.template-1')
</body>
</html>
