@extends('layouts.master')

@section('content')
    {{--<div class="page">--}}
        {{--<div class="container">--}}
            {{--<h1>{!! $model->getTitle() !!}</h1>--}}
            {{--<hr>--}}
            {{--@foreach($model->items as $item)--}}
                {{--<div class="photo">--}}
                    {{--<div class="image-wrap">--}}
                        {{--<a href="{!! $item->image !!}" data-lightbox="photoalbum1" class="hover-wrap">--}}
                            {{--<span class="overlay-img"></span>--}}
                            {{--<span class="overlay-text glyphincon glyphicon-plus"></span>--}}
                        {{--</a>--}}
                        {{--<img src="{!! $item->image !!}" alt="{!! $item->name !!}">--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- Our Work Section -->
    <div id="work" class="page">
        <div class="container">

            <!-- Portfolio Projects -->
            <div class="row">


                <div class="span9">
                    <div class="row">
                        <div class="title-page">
                            <h2 class="title">{!! $model->name !!}</h2>
                        </div>
                        <section id="projects">
                            <ul id="thumbs">
                                @foreach($model->items as $item)
                                    <!-- Item Project and Filter Name -->
                                    <li class="item-thumbs span3 design">
                                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="{!! $item->name !!}" href="{!! $item->image !!}">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb font-icon-plus"></span>
                                        </a>
                                        <!-- Thumb Image and Description -->
                                        <img src="{!! thumb($item->image, 200, 200) !!}" alt="{!! $item->title !!}">
                                    </li>
                                    <!-- End Item Project -->
                                @endforeach
                            </ul>
                        </section>

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