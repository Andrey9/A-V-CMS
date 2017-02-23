@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="heading">
            <h1>@lang('front_labels.news')</h1>
        </div>
        <div class="news_wrap">
            @foreach($list as $item)
                <div class="new col-md-4">
                    <div class="news_heading">
                        <h3>{!! $item->name !!}</h3>
                    </div>
                    <div class="posted_at">
                        <p>{!! \Carbon::parse($item->publish_at)->format('d.m.y') !!}</p>
                    </div>
                    <div class="short_content">
                        <p>{!! $item->getShortContent() !!}</p>
                    </div>
                    <a href="{!! $item->getUrl() !!}">@lang('front_labels.more_details')</a>
                </div>
            @endforeach
        </div>
    </div>
@stop