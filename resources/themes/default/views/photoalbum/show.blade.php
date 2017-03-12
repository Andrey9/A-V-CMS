@extends('layouts.master')

@section('content')
    <div class="page">
        <div class="container">
            <h1>{!! $model->title !!}</h1>
            <hr>
            @foreach($model->items as $item)
                <div class="photo">
                    <div class="image-wrap">
                        <a href="{!! $item->image !!}" data-lightbox="photoalbum1" class="hover-wrap">
                            <span class="overlay-img"></span>
                            <span class="overlay-text glyphincon glyphicon-plus"></span>
                        </a>
                        <img src="{!! $item->image !!}" alt="{!! $item->name !!}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        overlay_width_calc()
    </script>
@stop