@extends('emails.master')

<?php
$comment = unserialize($comment);
$campaign = unserialize($campaign);
?>

@section('content')
    {!! trans('messages.user email message about new comment on his campaign', ['link' => link_to_route('profiles.comments', $campaign->name)]) !!}
    <br>
    <div><b>@lang('labels.user'):</b> {!! $comment->getUserName() !!}</div>
    <div><b>@lang('labels.comment'):</b> {!! $comment->comment !!}</div>
@stop