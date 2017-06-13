@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="span12">

                <div class="row">
                    <div class="span3 teacher-photo">
                        <img src="{!! thumb($model->image, 200, 300) !!}" alt="">
                    </div>
                    <div class="span9 teacher-description">
                        <h3>{!! $model->name !!}</h3>
                        <div class="tabbable">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active"><a href="#tabMain" data-toggle="tab">@lang('labels.main_info')</a></li>
                                @if(count($model->visible_items))
                                    @foreach($model->visible_items as $key => $item)
                                        <li><a href="#tab{!! $item->id !!}" data-toggle="tab">{!! $item->name !!}</a></li>
                                    @endforeach
                                @endif
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tabMain">
                                    {!! $model->description !!}
                                </div>
                                @if(count($model->visible_items))
                                    @foreach($model->visible_items as $key => $item)
                                        <div class="tab-pane fade in" id="tab{!! $item->id !!}">
                                            {!! $item->content !!}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


                {{--@if(count($model->visible_items))--}}
                    {{--<div class="row">--}}
                        {{--<div class="span12">--}}
                            {{--<div class="tabbable">--}}

                                {{--<ul class="nav nav-tabs" id="myTab">--}}
                                    {{--@foreach($model->visible_items as $key => $item)--}}
                                        {{--<li @if($key == 0 ) class="active" @endif><a href="#tab{!! $item->id !!}" data-toggle="tab">{!! $item->name !!}</a></li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}

                                {{--<div class="tab-content">--}}
                                    {{--@foreach($model->visible_items as $key => $item)--}}
                                        {{--<div class="tab-pane fade in @if($key == 0 ) active @endif" id="tab{!! $item->id !!}">--}}
                                            {{--{!! $item->content !!}--}}
                                        {{--</div>--}}
                                    {{--@endforeach--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endif--}}
            </div>
        </div>
    </div>
@stop