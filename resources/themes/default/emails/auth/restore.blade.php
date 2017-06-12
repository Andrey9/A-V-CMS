@extends('emails.master')

@section('content')

    <div>
        @lang('messages.password reset email with reset :link', ['link' => link_to(route('auth.reset', ['email' => $email, 'token' => $token]), trans('labels.reset_password'))])
    </div>

@stop