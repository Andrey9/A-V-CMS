@extends('emails.master')

<?php $user = unserialize($user); ?>

@section('content')
    {!! trans('messages.admin email message about new user on site', ['link' => link_to(route('admin.user.show', $user->id), $user->getFullName())]) !!}
@stop