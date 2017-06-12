@extends('emails.master')

<?php $campaign = unserialize($campaign); ?>

@section('content')
    {!! trans('messages.admin email message about new campaign on site', ['link' => link_to(route('admin.campaign.show', $campaign->id), $campaign->name)]) !!}
@stop