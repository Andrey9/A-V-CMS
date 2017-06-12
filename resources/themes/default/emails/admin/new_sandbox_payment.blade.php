@extends('emails.master')

<?php
$invoice = unserialize($invoice);
$campaign = unserialize($campaign);
?>

@section('content')
    {!! trans('messages.admin email message about new sandbox payment :amount :link :link_campaign',
        [
            'amount' => $invoice->amount.' '.trans('labels.grn'),
            'link' => link_to(route('admin.invoice.show', $invoice->id), trans('labels.payment')),
            'link_campaign' => link_to($campaign->getUrl(), $campaign->name)
        ])
    !!}
@stop