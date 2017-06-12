@extends('layouts.master')

@section('content')
    <div id="content"></div>
    {!! Widget::widget__text_widget('speciality', 'page') !!}

    {!! Widget::widget__teacher('page-alternate') !!}

    {!! Widget::widget__text_widget('collaboration', 'page') !!}

    {!! Widget::widget__last_news('page-alternate', 'index', 3) !!}

    {!! Widget::widget__photoalbums('page', 'index', 3) !!}

@endsection