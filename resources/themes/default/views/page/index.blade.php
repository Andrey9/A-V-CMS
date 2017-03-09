@extends('layouts.master')

@section('content')
    <div id="body"></div>
   <script>
       $(document).ready(function(){
           var components = JSON.parse('{!! $model->contents !!}');
//            console.log(components);
           var html = '';
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
//                       html += response;
                       $('#body').append(response);
                       console.log(response);
                   });
               }
           });
           console.log(html);
//           $('header').after(html);
       })
   </script>
@stop