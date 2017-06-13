@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="error-page-block">
            <h1>@lang('front_labels.404_heading')</h1>
            <p>@lang('front_labels.404_content')</p>
            <a href="{!! route('home') !!}">@lang('front_labels.404_back_to_home')</a>
        </div>
    </div>

    <style>
        .content{
            height: calc(100vh - 128px);
        }
        .error-page-block{
            position: relative;
            top: 30vh;
            text-align: center;
        }
        .error-page-block h1{
            font-size: 36px;
        }
        @media (max-width: 365px){
            .error-page-block h1{
                font-size: 26px;
            }
        }
    </style>
@stop