@extends('emails.master')

<?php $invoice = unserialize($invoice); ?>

@section('content')
    {!!
        trans('messages.admin email message about new manually added amount :link_invoice',
            ['link_invoice' => link_to(route('admin.invoice.edit', $invoice->id), trans('labels.invoice_request'))])
    !!}
@stop