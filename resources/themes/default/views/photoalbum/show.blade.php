@extends('layouts.container')

@section('content')
    <h1>{!! $model->getTitle() !!}</h1>

    @foreach($model->items as $item)
        <div class="col-md-4">
            <a href="{!! $item->image !!}" class="swipebox">
                <img  height="200px" src="{!! $item->image !!}" alt="">
                <p>{!! $item->name !!}</p>
            </a>

        </div>
    @endforeach
@stop