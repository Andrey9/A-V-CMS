@extends('layouts.master')

@section('content')
    <h1>{!! $model->getTitle() !!}</h1>
    <h1>@lang('labels.show_more')</h1>
    <a href="{!! url('/ru') !!}">рус</a>
    <br>
    <a href="{!! url('/ua') !!}">укр</a>
    <br>
    <a href="{!! url('/en') !!}">eng</a>
    <p>{!! $model->getContent() !!}</p>
@endsection