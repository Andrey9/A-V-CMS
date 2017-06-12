@extends('emails.master')

<?php $campaign = unserialize($campaign); ?>

@section('content')
    <div>{!! trans('messages.admin email message about campaign edit :link', ['link' => link_to(route('admin.campaign.show', $campaign->id), $campaign->name)]) !!}</div>
@stop