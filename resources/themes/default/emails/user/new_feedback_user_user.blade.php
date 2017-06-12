@extends('emails.master')

@section('content')
    {!! trans('messages.user email message about new feedback to him :link', ['link' => link_to_route('home', config('app.name'))]) !!}
    <br>
    <div><b>@lang('labels.user'):</b> {!! $full_name !!}</div>
    @if ($email)
        <div><b>@lang('labels.email'):</b> {!! $email !!}</div>
    @endif
    <div><b>@lang('labels.message'):</b> {!! $user_message !!}</div>
@stop