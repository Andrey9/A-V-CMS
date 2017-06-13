@extends('layouts.master')

@section('content')
    <!-- Our Work Section -->
    <div id="work" class="page">
        <div class="container">
            <!-- Portfolio Projects -->
            <div class="row">
                <div class="span9">
                    <div class="row">
                        <div class="title-page text-widget">
                            <h2 class="title">{!! $model->meta_title !!}</h2>
                        </div>
                    @foreach($list as $item)
                        <!-- Start Profile -->
                            <div class="span4">
                                <a href="{!! route('photoalbum.show', ['slug' => $item->slug]) !!}">
                                    <div class="image-wrap">
                                        {{--<div class="hover-wrap">--}}
                                        {{--<span class="overlay-img"></span>--}}
                                        {{--<span class="overlay-text-thumb">{!! $item->title !!}</span>--}}
                                        {{--</div>--}}
                                        <img src="{!! $item->items[0]->image !!}" alt="{!! $item->title !!}">
                                    </div>
                                    <h3 class="profile-name">{!! $item->name !!}</h3>
                                </a>
                            </div>
                            <!-- End Profile -->
                        @endforeach
                    </div>
                </div>
                <div class="span3">
                    <!-- Filter -->
                {!! Widget::widget__last_news('', 'sidebar', 3) !!}
                <!-- End Filter -->
                </div>
            </div>
            <!-- End Portfolio Projects -->
        </div>
    </div>
    <!-- End Our Work Section -->
@stop