<!DOCTYPE html>
<html lang="en">
<head>
    <title>@lang('labels.error') 404!</title>
    @include('partials.styles')
</head>
<body>

<header>
    <div class="container">
        <a href="{!! route('home') !!}">
            <div class="logo">
                <img src="{!! asset('assets/themes/default/img/logo.png') !!}" alt="Programmer HPK">
            </div>
        </a>
        <button class="hamburger hamburger--spin" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
        {!! Widget::widget__menu() !!}
    </div>
</header>

<div class="page">
    <div class="container">
        <div class="text">
            <h1>@lang('labels.error') 404!</h1>
            <h2>@lang('labels.page') @lang('labels.not_found')!</h2>
        </div>
    </div>
</div>
<style>
    .text{
        height: 100px;
        width: 400px;
        margin: 0 auto;
        text-align: center;
        margin-top: 150px;
    }
</style>

<footer>
    <div class="container">
        <h5 class="copyright">
            Copyright © 2017 <a href="http://hpk.edu.ua/" target="_blank">@lang('front_labels.footer_link')</a>
        </h5>
        <h5>
            @lang('front_labels.footer_address') <a href="tel:@lang('front_labels.footer_phone')">@lang('front_labels.footer_phone')</a>
        </h5>
    </div>
</footer>
<div data-email-error="@lang('messages.enter correct email')" class="message-container"></div>
<div class="languageSet">
    <a href="#" class="toggler">
        <img class="closed" src="{!! asset('assets/themes/default/img/lang.png') !!}" alt="language">
        <img class="opened" src="{!! asset('assets/themes/default/img/close.png') !!}" alt="language">
    </a>
    <div class="links">
        <?php $url = LaravelLocalization::getNonLocalizedURL(\Request::path()); ?>
        <a href="{!! LaravelLocalization::getLocalizedURL('ua', $url) !!}">
            <img src="{!! asset('assets/themes/default/img/ua.png') !!}" alt="ua">
        </a>
        <a href="{!! LaravelLocalization::getLocalizedURL('en', $url) !!}">
            <img src="{!! asset('assets/themes/default/img/en.png') !!}" alt="en">
        </a>
        <a href="{!! LaravelLocalization::getLocalizedURL('ru', $url) !!}" onclick="return false" title="@lang('front_messages.unclickable')">
            <img src="{!! asset('assets/themes/default/img/ru.png') !!}" alt="ru">
        </a>
    </div>
</div>
@if(!route_is('home'))
    <style>
        body{
            background: #daffff;
        }
        .page{
            margin-bottom: 50px;
        }
        footer{
            height:50px;
            padding: 0;
            position: fixed;
            bottom: 0;
            width:100%;
        }
        footer h5{
            font-size: 10px;
        }
    </style>
@endif
<!--    Scripts     -->
@include('partials.scripts')
</body>
</html>
