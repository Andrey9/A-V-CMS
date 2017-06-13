@if (is_array($item))
    <div class="form-group">
        <div class="form-group">
            {!! Form::text('items['.$key.'][' . $id . '][' . $locale. '][name]', $item[$locale]['name'], ['id' => 'items.'.$key.'.' . $id . '.' . $locale. '.name', 'placeholder' => trans('labels.name'), 'class' => 'form-control input-sm']) !!}
        </div>

        <div class="form-group @if ($errors->has('items.'.$key.'.' .$id. '.'. $locale .'.content')) has-error @endif">
            {!! Form::textarea('items['.$key.'][' . $id . '][' . $locale. '][content]', $item[$locale]['content'], ['id' => 'items.'.$key.'.' . $id . '.' . $locale. '.content', 'placeholder' => trans('labels.content'), 'rows' => 2, 'class' => 'form-control input-sm']) !!}

            {!! $errors->first('items.new.' .$id. '.content', '<p class="help-block error">:message</p>') !!}
        </div>
    </div>
@else
    <div class="form-group">
        <div class="form-group">
            {!! Form::text('items['.$key.'][' . $id . '][' . $locale. '][name]', isset($item->translate($locale)->name) ? $item->translate($locale)->name : '', ['id' => 'items.'.$key.'.' . $id . '.' . $locale. '.name', 'placeholder' => trans('labels.name'), 'class' => 'form-control input-sm']) !!}
        </div>

        <div class="form-group @if ($errors->has('items.'.$key.'.' .$id. '.'. $locale .'.content')) has-error @endif">
            {!! Form::textarea('items['.$key.'][' . $id . '][' . $locale. '][content]', isset($item->translate($locale)->content) ? $item->translate($locale)->content : '', ['id' => 'items.'.$key.'.' . $id . '.' . $locale. '.content', 'placeholder' => trans('labels.content'), 'rows' => 2, 'class' => 'form-control input-sm']) !!}

            {!! $errors->first('items.new.' .$id. '.content', '<p class="help-block error">:message</p>') !!}
        </div>
    </div>
@endif

@include('partials.tabs.ckeditor', ['id' => 'items.'.$key.'.' .$id. '.'. $locale .'.content'])