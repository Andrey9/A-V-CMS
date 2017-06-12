@extends('emails.master')

<?php
$campaign = unserialize($campaign);
?>

@section('content')
    {!! trans('messages.user email message about new feedback on his campaign', ['link' => link_to($campaign->getUrl(), $campaign->name)]) !!}
    <br>
    <div><b>@lang('labels.user'):</b> {!! $full_name !!}</div>
    @if ($email)
        <div><b>@lang('labels.email'):</b> {!! $email !!}</div>
    @endif
    <div><b>@lang('labels.message'):</b> {!! $user_message !!}</div>
@stop