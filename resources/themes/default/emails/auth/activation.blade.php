@extends('emails.master')

<?php $user = unserialize($user); ?>

@section('content')

    <div>
        @lang('messages.user activation email message :link :activation_link', [
            'link' => link_to(route('home'), config('app.name')),
            'activation_link' => link_to(route('auth.activate', ['email' => $user->email, 'code' => $user->getActivationCode()]), trans('labels.activate_profile_as_action'))
        ])
    </div>

@stop