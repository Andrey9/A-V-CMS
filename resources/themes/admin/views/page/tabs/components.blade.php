<div class="row">
    <div class="form-group col-md-4">
        <div class="form-group required @if ($errors->has('template')) has-error @endif">
            {!! Form::label('status', trans('labels.template'), array('class' => 'control-label col-xs-4 col-sm-2 col-md-4')) !!}

            <div class="col-xs-12 col-sm-4 col-md-6">
                {!! Form::select('template',
                [
                    'not_set' => trans('labels.not_set'),
                    '1' => trans('labels.template').' 1',
                    '2' => trans('labels.template').' 2',
                    '3' => trans('labels.template').' 3',
                    '4' => trans('labels.template').' 4'
                ],
                null, array('class' => 'form-control select2 input-sm', 'aria-hidden' => 'true')) !!}

                {!! $errors->first('template', '<p class="help-block error">:message</p>') !!}
            </div>
        </div>

        <div class="form-group required @if ($errors->has('type')) has-error @endif">
            {!! Form::label('status', trans('labels.type'), array('class' => 'control-label col-xs-4 col-sm-2 col-md-4')) !!}

            <div class="col-xs-12 col-sm-4 col-md-6">
                {!! Form::select('type',
                [
                    'not_set' => trans('labels.not_set'),
                    'banner' => trans('labels.banner'),
                    'news' => trans('labels.news'),
                    'photoalbum' => trans('labels.photoalbum'),
                    'text_widget' => trans('labels.text_widget'),
                ], null, array('id' => 'element-type-select','class' => 'form-control select2 input-sm', 'aria-hidden' => 'true')) !!}

                {!! $errors->first('type', '<p class="help-block error">:message</p>') !!}
            </div>
        </div>

        <div class="form-group required @if ($errors->has('element-id')) has-error @endif">
            {!! Form::label('element-id', trans('labels.element'), array('class' => 'control-label col-xs-4 col-sm-2 col-md-4')) !!}

            <div class="col-xs-12 col-sm-4 col-md-6">
                {!! Form::select('element-id',
                [
                    'not_set' => trans('labels.not_set'),
                ], null, array('id' => 'element-id','class' => 'form-control select2 input-sm', 'aria-hidden' => 'true', 'disabled' => true)) !!}

                {!! $errors->first('element-id', '<p class="help-block error">:message</p>') !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::button(trans('labels.add'),['id' => 'add-component-to-list', 'class' => 'btn btn-success btn-flat col-md-4 col-md-offset-5', 'disabled' => true]) !!}
        </div>
    </div>

    <div class="components col-md-8" data-id="{!! $model->id !!}">
        {{--<div class="component">
            <h4>Test 1</h4>
            <h4>Test 1</h4>
            <div class="controls">
                <input type="checkbox" class="status-switch" checked>
                <button class="delete-component btn btn-danger btn-flat"><span class="glyphicon glyphicon-remove"></span></button>
            </div>

        </div>--}}
    </div>
</div>


<style>
    .components{
        border: 2px solid #00a65a;
        overflow: auto;
        min-height:191px;
        padding: 0 3px;
    }
    .component{
        border: 2px solid #00a65a;
        width: 100%;
        margin: 3px auto;
    }
    .component h4{
        display: inline-block;
        margin: 10px 10px;
        width: 200px;
        overflow: hidden;

    }
    .component .controls{
        float: right;
        margin-right: 2px;
        margin-top: 2px;
    }
    .component .controls button{
        margin-left: 20px;
    }
</style>

<script>
    $(document).ready(function () {
        var contents = JSON.parse('{!! $model->contents !!}');
        console.log(contents);

        contents.forEach(function(item){
            addComponent(item);
        });

        processCheckboxes();
    });

    function sendChanges(){
        var components = $('.components');
        var token = $(document).find('input[name=_token]').val();
        var json = prepareJSON(components);
        $.ajax({
            type: "POST",
            url: "/admin/update-page-contents",
            data:{
                _token: token,
                contents: json,
                page_id: components.data('id')
            }
        }).done(function(response){
//            console.log(response);
        })
    }

    function prepareJSON(components){
        var json = [];

        components.children().each(function(){
            var component = {
                "elementTypeText": $(this).find('h4.type').text(),
                "elementType": $(this).find('input[name=element-type]').val(),
                "elementIdText": $(this).find('h4.id').text(),
                "elementId": $(this).find('input[name=element-id]').val(),
                "status": $(this).find('input[name=element-status]').data('value')
//                "position": parseInt($(this).find('input[name=position]').val())
            };
            json.push(component);
        });

        return JSON.stringify(json);
    }

    function processCheckboxes(){
        $(document).find('input.element-status-switch').each(function(){
            $(this).bootstrapSwitch();
        });
    }

    $(document).on('change', '#element-type-select', function(){
        var elemType = $('#element-type-select');
        var elemId = $('#element-id');
        elemId.find('option:not(:first)').remove();
        elemId.val('not_set').trigger('change');
        console.log(elemId.val());
        if (elemType.val() != 'not_set'){
            $.ajax({
                type: "GET",
                url: "/admin/element-type-select",
                data: {
                    type: elemType.val()
                }
            }).done(function(response){
                console.log(response);
                var options = '';
                response.forEach(function(index){
                    console.log('id '+index.id, 'name '+index.title);
                    options += '<option value="'+ index.id +'">'+ index.title +'</option>';
                });
                console.log(options);
                elemId.append(options);
            });
            elemId.attr('disabled', false);
        }else{
            elemId.attr('disabled', true);
            $('#add-component-to-list').attr('disabled', true);
        }
    });

    $(document).on('change', '#element-id', function(){
        console.log($(this).val());
        if ($(this).val() != 'not_set'){
            $('#add-component-to-list').attr('disabled', false);
        }else{
            $('#add-component-to-list').attr('disabled', true);
        }
    });

    function addComponent(item){
        var components = $('.components');
        var html = '';
        html += '<div class="component">';
        html += '<h4 class="type">'+ item.elementTypeText +'</h4>';
        html += '<input type="hidden" name="element-type" value="'+ item.elementType +'">';
        html += '<h4 class="id">'+ item.elementIdText +'</h4>';
        html += '<input type="hidden" name="element-id" value="'+ item.elementId +'">';
//        html += '<input type="hidden" name="position" value="'+ item.position +'">';
        html += '<div class="controls">';
        if (item.status){
            html += '<input name="element-status" type="checkbox" class="element-status-switch" checked data-value="'+ item.status +'">';
        }else{
            html += '<input name="element-status" type="checkbox" class="element-status-switch" data-value="'+ item.status +'">';
        }
        html += '<button class="delete-component btn btn-danger btn-flat"><span class="glyphicon glyphicon-remove"></span></button>';
        html += '</div>';
        html += '</div>';
//        console.log(html);
        components.append(html);
    }

    $('#add-component-to-list').on('click', function(){
        var position = 1;
        var checked = false;

        var component = {
            "elementTypeText": $('#element-type-select :selected').text(),
            "elementType": $('#element-type-select').val(),
            "elementIdText": $('#element-id :selected').text(),
            "elementId": $('#element-id').val(),
            "status": true
//            "position": parseInt($(this).find('input[name=position]').val())
        };
        $('#element-id').val('not_set').trigger('change');
        $('#element-type-select').val('not_set').trigger('change');
        $('#element-id').find('option:not(:first)').remove();
        $('#element-id').attr('disabled', true);
        $('#add-component-to-list').attr('disabled', true);
        addComponent(component);
        processCheckboxes();
        sendChanges();
    });

    $(document).on('click', '.bootstrap-switch-wrapper', function(){
        var value = $(this).find('input[name=element-status]');
        value.data('value',!value.data('value'));
        console.log(value.data('value'));
        sendChanges();
    });

    $(document).on('click', '.delete-component', function(event){
        event.preventDefault();
        $(this).parents('.component').remove();
        sendChanges();
    });

    $( function() {
        $(document).find( ".components" ).sortable({
            'ui-floating': 'auto',
            cancel: ".bootstrap-switch-wrapper, input, .btn", // - елементи які повинні залишатись клікабельними
            stop: function( event, ui ) {
                sendChanges()
            }
        });

    } );

</script>