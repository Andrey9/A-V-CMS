@extends('layouts.debug')

@section('content')
    <div id="body"></div>
    <script>
        $(document).ready(function(){
            var components = JSON.parse('{!! $model->contents !!}');
//            console.log(components);
            components.forEach(function(item){
//                console.log(item.status);
                if (item.status == true){
                    $.ajax({
                        type: "GET",
                        url: "/"+$('html').attr('lang')+"/page/get-element",
                        data: {
                            type: item.elementType,
                            id: item.elementId
                        }
                    }).done(function(response){
                        $('#body').append(response);
//                        console.log(response);
                    });
                }

            });
        })
    </script>
@stop