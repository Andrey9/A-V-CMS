@extends('emails.master')

@section('content')

    <div>
        <div> @lang('messages.congratulations, you have successfully reset your password')</div>
        <br />

        <div>@lang('messages.to login in your account use next data'): </div>
        <br />

        <div><b>@lang('labels.email')</b>: {!! $email  !!}</div>
        <br />
        <div><b>@lang('labels.password')</b>: {!! $password !!}</div>
    </div>

@stop