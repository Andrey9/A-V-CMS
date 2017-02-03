@extends('layouts.editable')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['route' => 'admin.photoalbum.store', 'role' => 'form', 'class' => 'form-horizontal']) !!}

                @include('photoalbum.partials._form')

            {!! Form::close() !!}
        </div>
    </div>
@stop