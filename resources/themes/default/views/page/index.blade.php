@extends('layouts.master')

@section('content')
   <div class="page">
       <div class="container">
           <h1>{!! $model->getTitle() !!}</h1>
           <hr>
           <div class="content">
               {!! $model->getContent() !!}
           </div>
       </div>
   </div>
@stop