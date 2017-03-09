@extends('layouts.main')

@section('content')
    <script src="{!! asset('assets/themes/admin/vendor/adminlte/plugins/ckeditor/ckeditor.js') !!}"></script>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="col-xs-12 col-sm-4 col-md-12">
                        <h2>@lang('labels.template')</h2>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        {!! Form::select('template',
                        [
                            '1' => trans('labels.programming'),
                        ], null, array('id' => 'template-select','class' => ' form-control select2 input-sm', 'aria-hidden' => 'true')) !!}

                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-8">
                        <img src="{!! asset('assets/themes/admin/img/template-'.$model->template.'.jpg') !!}" alt="" style="width: 550px; height:350px; object-fit: cover">
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-12">
                        <hr>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <h2>@lang('labels.logo')</h2>
                        {!! Form::imageInput('logo', $model->logo) !!}
                    </div>

                    <div class="col-xs-12 col-sm-7 col-md-4 col-md-offset-2">
                        <h2>@lang('labels.menu')</h2>
                        {!! Form::select('menu_id', $menus , $model->menu_id, array('id' => 'menu-id-select','class' => 'dashboard-setting form-control select2 input-sm', 'aria-hidden' => 'true')) !!}

                        {!! $errors->first('type', '<p class="help-block error">:message</p>') !!}
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-12">
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <h2>@lang('labels.footer')</h2>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                @foreach (config('app.locales') as $key => $locale)
                                    <li @if ($key == 0) class="active" @endif>
                                        <a aria-expanded="false" href="#tab_{!! $locale !!}" data-toggle="tab">
                                            <i class="flag flag-{!! $locale !!}"></i>
                                            @lang('labels.tab_'.$locale)
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="tab-content" style="min-height: 400px;">
                                @foreach (config('app.locales') as $key => $locale)
                                    <div class="tab-pane fade in @if ($key == 0) active @endif" id="tab_{!! $locale !!}">
                                        @include('views.dashboard.tabs.locale', array('errors' => $errors, 'model' => $model , 'locale' => $locale))
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                {!! Form::button(trans('labels.save'),['id' => 'save-footer', 'class' => 'btn btn-success btn-flat col-md-4']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-12">
                            <hr>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-8">
                            <h2>@lang('labels.feedback_form')</h2>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4" style="padding-top: 25px">
                            <input name="feedback" type="checkbox" class="element-status-switch" {!!  ($model->feedback) ? 'checked' : '' !!}  value="{!! !$model->feedback !!}">
                        </div>

                        <script>
                            $('#save-footer').on('click', function(e){
                                e.preventDefault();
                                var token = '{!! csrf_token() !!}';
                                var ru = CKEDITOR.instances['footer_ru'].getData();
                                var ua = CKEDITOR.instances['footer_ua'].getData();
                                var en = CKEDITOR.instances['footer_en'].getData();
                                console.log(ru, ua, en);
                                var data = [
                                    {
                                        'locale': 'ru',
                                        'footer': ru
                                    },
                                    {
                                        'locale': 'ua',
                                        'footer': ua
                                    },
                                    {
                                        'locale': 'en',
                                        'footer': en
                                    }
                                ];
                                $.ajax({
                                    type: "POST",
                                    url: "/admin/dashboard/update-footer",
                                    data: {
                                        _token: token,
                                        footers: JSON.stringify(data)
                                    }
                                }).done(function(response){
                                    console.log(response);
                                })

                            });
                            $('.element-status-switch').bootstrapSwitch();

                            $('.bootstrap-switch').on('click',function(){
                                console.log('change');
                                updateDashboard($('.element-status-switch'));
                                if ($('.element-status-switch').val() == 0){
                                    $('.element-status-switch').val(1);
                                }else{
                                    $('.element-status-switch').val(0)
                                }
                            });
                            $('input[name=logo]').on('change', function(){
                                updateDashboard($(this));
                            });

                            $('#template-select').on('change', function(){
                                updateDashboard($(this));
                            });

                            $('#menu-id-select').on('change', function(){
                                updateDashboard($(this));
                            });

                            function updateDashboard(field){
                                var token = '{!! csrf_token() !!}';
                                $.ajax({
                                    type: "POST",
                                    url: "/admin/dashboard/update",
                                    data:{
                                        attr: field.attr('name'),
                                        _token: token,
                                        value: field.val()
                                    }
                                }).done(function(response){
                                    console.log(response);
                                })
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop