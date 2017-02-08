@extends('layouts.container')

@section('content')
    <h1>{!! $model->getTitle() !!}</h1>
    <h1>@lang('labels.show_more')</h1>
    <h3>{!! $model->getShortContent() !!}</h3>
    <p>{!! $model->getContent() !!}</p>
    <div class="photoalbums">
        {!! Widget::widget__photoalbums() !!}
    </div>
@endsection