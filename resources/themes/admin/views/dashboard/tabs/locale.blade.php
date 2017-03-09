    <div class="col-xs-12 col-sm-7 col-md-10">
        {!! Form::textarea($locale.'[footer]', isset($model->translate($locale)->footer) ? $model->translate($locale)->footer : '', ['id' => 'footer_'.$locale, 'placeholder'=> trans('labels.footer'), 'class' => 'form-control input-sm footer_'.$locale]) !!}

        {!! $errors->first($locale.'.footer', '<p class="help-block error">:message</p>') !!}
    </div>

    @include('partials.tabs.ckeditor', ['id' => 'footer_'.$locale])