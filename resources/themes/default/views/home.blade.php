@extends('layouts.master')

@section('content')
    {!! Widget::widget__banner() !!}
    <div id="speciality" class="speciality">
        <div class="container">
            <div class="heading yellow col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1>@lang('front_labels.speciality')</h1>
            </div>
            <div class="sub_heading clearfix col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <section class="left">
                    <h3>@lang('front_labels.speciality_term')</h3>
                </section>
                <section class="right">
                    <h3>@lang('front_labels.speciality_after9')</h3>
                    <h3>@lang('front_labels.speciality_after11')</h3>
                </section>
            </div>
            <div class="text col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p>@lang('front_texts.speciality_p1')</p>
                <p>@lang('front_texts.speciality_p2')</p>
            </div>
        </div>
    </div>

    <div id="commission" class="commission">
        <div class="container">
            <div class="heading white">
                <h1>@lang('front_labels.commission')</h1>
            </div>
            <div class="photos clearfix">
                <div class="photo col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="image-wrap">
                        <div class="hover-wrap">
                            <span class="overlay-img"></span>
                            <span class="overlay-text">@lang('front_labels.commission1_pos')</span>
                        </div>
                        <img src="{!! asset('assets/themes/default/img/Gumenna_V_v.jpg') !!}" alt="@lang('front_labels.commission1_name')">
                    </div>
                    <div class="desc">
                        <p>@lang('front_labels.commission1_name')</p>
                    </div>
                </div>
                <div class="photo col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="image-wrap">
                        <div class="hover-wrap">
                            <span class="overlay-img"></span>
                            <span class="overlay-text">@lang('front_labels.commission2_pos')</span>
                        </div>
                        <img src="{!! asset('assets/themes/default/img/Solomko_L_a.jpg') !!}" alt="@lang('front_labels.commission2_name')">
                    </div>
                    <div class="desc">
                        <p>@lang('front_labels.commission2_name')</p>
                    </div>
                </div>
            </div>
            <a href="{!! LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),url('pages/committee')) !!}" class="show_more center-block">@lang('labels.show')</a>
        </div>
    </div>

    <div id="collaboration" class="collaboration">
        <div class="container">
            <div class="heading yellow">
                <h1>@lang('front_labels.collaboration')</h1>
            </div>
            <div class="text">
                <p>@lang('front_texts.collaboration_p')</p>
            </div>
            <div class="logos">
                <div class="company">
                    <a href="http://amcbridge.com.ua" target="_blank">
                        <img src="{!! asset('assets/themes/default/img/AQUASOFT.png') !!}" alt="">
                    </a>
                </div>
                <div class="company">
                    <a href="https://rexsoftinc.com/" target="_blank">
                        <img src="{!! asset('assets/themes/default/img/rexsoft.png') !!}" alt="">
                    </a>
                </div>
                <div class="company">
                    <a href="http://www.auditsoft.com.ua/" target="_blank">
                        <img src="{!! asset('assets/themes/default/img/auditsoft.jpg') !!}" alt="">
                    </a>
                </div>
                <div class="company">
                    <a href="http://www.malkosua.com/site/" target="_blank">
                        <img src="{!! asset('assets/themes/default/img/malkos.png') !!}" alt="">
                    </a>
                </div>
                <div class="company">
                    <a href="https://softbistro.com/" target="_blank">
                        <img src="{!! asset('assets/themes/default/img/softbistro.png') !!}" alt="">
                    </a>
                </div>
                <div class="company">
                    <a href="https://stfalcon.com/" target="_blank">
                        <img src="{!! asset('assets/themes/default/img/stfalcon.png') !!}" alt="">
                    </a>
                </div>
                <div class="company">
                    <a href="https://www.bigstockphoto.com/ru/" target="_blank">
                        <img src="{!! asset('assets/themes/default/img/BigStock.jpg') !!}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="graduates" class="graduates">
        <div class="container">
            <div class="heading white">
                <h1>@lang('front_labels.graduates')</h1>
            </div>
            <div class="photos">
                <div class="photo col-lg-2 col-md-2 col-sm-4 col-xs-6">
                    <div class="image-wrap">
                        <div class="hover-wrap">
                            <span class="overlay-img"></span>
                            <span class="overlay-text">@lang('front_labels.graduates1')</span>
                        </div>
                        <img class="right" src="{!! asset('assets/themes/default/img/gordienko.jpg') !!}" alt="gumenna">
                    </div>
                </div>
                {{--<div class="photo col-lg-2 col-md-2 col-sm-4 col-xs-6">
                    <div class="image-wrap">
                        <div class="hover-wrap">
                            <span class="overlay-img"></span>
                            <span class="overlay-text">@lang('front_labels.graduates2')</span>
                        </div>
                        <img src="{!! asset('assets/themes/default/img/Solomko_L_a.jpg') !!}" alt="gumenna">
                    </div>
                </div>--}}
                <div class="photo col-lg-2 col-md-2 col-sm-4 col-xs-6">
                    <div class="image-wrap">
                        <div class="hover-wrap">
                            <span class="overlay-img"></span>
                            <span class="overlay-text">@lang('front_labels.graduates3')</span>
                        </div>
                        <img src="{!! asset('assets/themes/default/img/gumeniuk.jpg') !!}" alt="gumenna">
                    </div>
                </div>
                <div class="photo col-lg-2 col-md-2 col-sm-4 col-xs-6">
                    <div class="image-wrap">
                        <div class="hover-wrap">
                            <span class="overlay-img"></span>
                            <span class="overlay-text">@lang('front_labels.graduates4')</span>
                        </div>
                        <img src="{!! asset('assets/themes/default/img/kurabko.jpg') !!}" alt="gumenna">
                    </div>
                </div>
                {{--<div class="photo col-lg-2 col-md-2 col-sm-4 col-xs-6">
                    <div class="image-wrap">
                        <div class="hover-wrap">
                            <span class="overlay-img"></span>
                            <span class="overlay-text">@lang('front_labels.graduates5')</span>
                        </div>
                        <img src="{!! asset('assets/themes/default/img/Solomko_L_a.jpg') !!}" alt="gumenna">
                    </div>
                </div>--}}
                <div class="photo col-lg-2 col-md-2 col-sm-4 col-xs-6">
                    <div class="image-wrap">
                        <div class="hover-wrap">
                            <span class="overlay-img"></span>
                            <span class="overlay-text">@lang('front_labels.graduates6')</span>
                        </div>
                        <img class="left" src="{!! asset('assets/themes/default/img/pogonevich.jpg') !!}" alt="gumenna">
                    </div>
                </div>
                <div class="photo col-lg-2 col-md-2 col-sm-4 col-xs-6">
                    <div class="image-wrap">
                        <div class="hover-wrap">
                            <span class="overlay-img"></span>
                            <span class="overlay-text">@lang('front_labels.graduates7')</span>
                        </div>
                        <img src="{!! asset('assets/themes/default/img/rabievsky.jpg') !!}" alt="gumenna">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Widget::widget__photoalbums() !!}

    {!! Widget::widget__last_news() !!}

    <div id="contacts" class="contacts">
        <div class="container">
            <div class="heading yellow">
                <h1>@lang('front_labels.contacts')</h1>
            </div>
            {!! Form::open(['role' => 'form', 'route' => 'feedback.store', 'class' => 'contacts_form']) !!}
                <div class="small_fields">
                    {!! Form::text('fio',null,['id' => 'fio','placeholder' => 'Name','required' => true]) !!}
                    {!! Form::text('email',null,['id' => 'email','placeholder' => 'EMail','required' => true]) !!}
                </div>
                <div class="message">
                    {!! Form::textarea('message', null,['placeholder' => 'Your message','required' => true])!!}
                </div>
                {!! Form::submit(trans('labels.send'), ['class' => 'show_more']) !!}
            {!! Form::close() !!}
            <div class="contact_info">
                <p>@lang('front_texts.contacts_p')</p>
            </div>
        </div>
    </div>
@endsection