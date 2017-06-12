@extends('emails.master')

@section('content')
    <div>@lang('messages.admin email message about new feedback')</div>

    <br>

    <div><b>@lang('labels.fio'): </b>{!! $fio !!}</div>
    <div><b>@lang('labels.email'): </b>{!! $email !!}</div>
    <div><b>@lang('labels.message'): </b>{!! $user_message !!}</div>
@stop