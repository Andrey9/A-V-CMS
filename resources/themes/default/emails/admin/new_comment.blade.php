@extends('emails.master')

<?php
$comment = unserialize($comment);
$campaign = unserialize($campaign);
?>

@section('content')
    {!! trans('messages.admin email message about new comment :link', ['link' => link_to_route('admin.comment.edit', trans('labels.comment'), ['id' => $comment->id])]) !!}
    <br>
    <div><b>@lang('labels.user'):</b> {!! $comment->getUserName() !!}</div>
    <div><b>@lang('labels.comment'):</b> {!! $comment->comment !!}</div>
@stop