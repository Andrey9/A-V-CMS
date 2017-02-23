<!-- Meta tags -->
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>@if(isset($model)) {!! $model->meta_title !!} @elseif(isset($title)) {!! $title !!} @endif</title>
<meta name="description" content="@if(isset($model)) {!! $model->meta_description !!} @endif">
<meta name="keywords" content="@if(isset($model)) {!! $model->meta_keywords !!} @endif">
<meta name="og:title" content="@if(isset($model)) {!! $model->meta_title !!} @endif">
<meta name="og:description" content="@if(isset($model)) {!! $model->meta_description !!} @endif">
<meta property="og:image" content='@if(isset($model)){!! $model->image !!}@endif' />
<meta name="twitter:title" content='@if(isset($model)){!! $model->meta_title !!}@endif'>
<meta name="twitter:description" content='@if(isset($model)){!! $model->meta_description !!}@endif' />
<meta name="twitter:image" content='@if(isset($model)){!! $model->image !!}@endif' />
<link rel="image_src" href="@if(isset($model)){!! $model->image !!}@endif" />