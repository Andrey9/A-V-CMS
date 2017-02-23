@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="new col-md-12">
            <div class="news_heading">
                <h3>{!! $model->name !!}</h3>
            </div>
            <div class="posted_at">
                <p>{!! \Carbon::parse($model->publish_at)->format('d.m.y') !!}</p>
            </div>
            <div class="content">
                <p>{!! $model->getContent() !!}</p>
            </div>
        </div>
    </div>
@stop