<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!-- Mobile Specifics -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="HandheldFriendly" content="true"/>
<meta name="MobileOptimized" content="320"/>
<!-- Mobile Internet Explorer ClearType Technology -->
<!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->
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
<!-- Google Font -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>

<!-- Fav Icon -->
<link rel="shortcut icon" href="#">

<link rel="apple-touch-icon" href="#">
<link rel="apple-touch-icon" sizes="114x114" href="#">
<link rel="apple-touch-icon" sizes="72x72" href="#">
<link rel="apple-touch-icon" sizes="144x144" href="#">

<!-- Bootstrap -->
<link href="{!! Theme::asset('/css/bootstrap.min.css') !!}" rel="stylesheet">

<!-- Main Style -->
<link href="{!! Theme::asset('/css/main.css') !!}" rel="stylesheet">

<!-- Supersized -->
<link href="{!! Theme::asset('/css/supersized.css') !!}" rel="stylesheet">
<link href="{!! Theme::asset('/css/supersized.shutter.css') !!}" rel="stylesheet">

<!-- FancyBox -->
<link href="{!! Theme::asset('/css/jquery.fancybox.css') !!}" rel="stylesheet">

<!-- Font Icons -->
<link href="{!! Theme::asset('/css/fonts.css') !!}" rel="stylesheet">

<!-- Shortcodes -->
<link href="{!! Theme::asset('/css/shortcodes.css') !!}" rel="stylesheet">

<!-- Responsive -->
<link href="{!! Theme::asset('/css/bootstrap-responsive.min.css') !!}" rel="stylesheet">
<link href="{!! Theme::asset('/css/responsive.css') !!}" rel="stylesheet">

<!-- Supersized -->
<link href="{!! Theme::asset('/css/supersized.css') !!}" rel="stylesheet">
<link href="{!! Theme::asset('/css/supersized.shutter.css') !!}" rel="stylesheet">

<link rel="stylesheet" href="{!! Theme::asset('/css/corrections.css') !!}">
<!-- Modernizr -->
<script src="{!! Theme::asset('/js/modernizr.js') !!}"></script>