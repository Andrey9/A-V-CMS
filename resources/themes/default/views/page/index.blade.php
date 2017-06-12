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
                            <h2 class="title">{!! $model->name !!}</h2>
                            <div class="content">{!! $model->content !!}</div>
                        </div>
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