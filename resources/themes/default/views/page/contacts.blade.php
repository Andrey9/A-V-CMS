@extends('layouts.master')

@section('content')
    <!-- Contact Section -->
    <div id="contact" class="page" style="padding-bottom: 20px">
        <div class="container">
            <!-- Title Page -->
            <div class="row">
                <div class="span12">
                    <div class="title-page">
                        <h2 class="title">{!! $model->name !!}</h2>
                        <h3 class="title-description">{!! $model->short_content !!}</h3>
                    </div>
                </div>
            </div>
            <!-- End Title Page -->

            <!-- Contact Form -->
            <div class="row">
                <div class="span9">

                    <form id="contact-form" class="contact-form" action="{!! route('feedback.store') !!}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <p class="contact-name">
                            <input id="contact_name" type="text" placeholder="@lang('labels.fio')" value="" name="name" />
                        </p>
                        <p class="contact-email">
                            <input id="contact_email" type="email" placeholder="@lang('labels.email')" value="" name="email" />
                        </p>
                        <p class="contact-message">
                            <textarea id="contact_message" placeholder="@lang('labels.message')" name="message" rows="15" cols="40"></textarea>
                        </p>
                        <p class="contact-submit">
                            <button type="submit" id="contact-submit" class="button" >@lang('labels.send')</button>
                        </p>

                        <div id="response">

                        </div>
                    </form>

                </div>

                <div class="span3">
                    <div class="contact-details">
                        {!! $model->content !!}
                    </div>
                </div>
            </div>
            <!-- End Contact Form -->
        </div>
    </div>
    <!-- End Contact Section -->
    <div class="container">
        <a href="#" class="button" id="show_map">@lang('labels.look_on_map')</a>
        <div id="gmap" ></div>
    </div>

    <style>
        #contact-form input, #contact-form textarea {
            border: 1px solid #ffffff;
            font-weight: 400;
            font-size: 18px;
            color: #0a0a0a;
        }
        #contact-form button{

        }
        #gmap {
            height: 500px;
            width: 100%;
            margin: 0 auto;
            display: none;
            margin-bottom: 20px;
        }
        #show_map{
            margin-bottom: 20px;
        }
    </style>
@stop

@section('scripts')
    <script src="{!! Theme::asset('/js/contacts.js') !!}"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAto4ibC9lvwoifRx1892O3jaXI_aGp7pM&callback=initMap">
    </script>
@stop