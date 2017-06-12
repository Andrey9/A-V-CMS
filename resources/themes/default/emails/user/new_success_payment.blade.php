@extends('emails.master')

<?php
$invoice = unserialize($invoice);
$campaign = unserialize($campaign);
?>

@section('content')
    {!! trans('messages.user email message about new success payment :amount :link',
        [
            'amount' => $invoice->amount.' '.trans('labels.grn'),
            'link' => link_to(localize_route('campaigns.donates', $campaign->id), $campaign->name),
        ])
    !!}
@stop