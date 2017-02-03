@extends('layouts.container')

@section('content')
    <div class="pull-right">
        <a href="{!! url('/ru') !!}">рус</a>
        <a href="{!! url('/ua') !!}">укр</a>
        <a href="{!! url('/en') !!}">eng</a>
    </div>
    <h1>{!! $model->getTitle() !!}</h1>
    <h1>@lang('labels.show_more')</h1>
    <h3>{!! $model->getShortContent() !!}</h3>
    <p>{!! $model->getContent() !!}</p>
@endsection