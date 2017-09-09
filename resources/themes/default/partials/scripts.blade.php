<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{!! Theme::asset('/js/bootstrap.min.js') !!}"></script>
<script src="{!! Theme::asset('/js/supersized.3.2.7.min.js') !!}"></script>
<script src="{!! Theme::asset('/js/waypoints.js') !!}"></script>
<script src="{!! Theme::asset('/js/waypoints-sticky.js') !!}"></script>
<script src="{!! Theme::asset('/js/jquery.isotope.js') !!}"></script>
<script src="{!! Theme::asset('/js/jquery.fancybox.pack.js') !!}"></script>
<script src="{!! Theme::asset('/js/jquery.fancybox-media.js') !!}"></script>
<script src="{!! Theme::asset('/js/jquery.tweet.js') !!}"></script>
<script src="{!! Theme::asset('/js/plugins.js') !!}"></script>
<script src="{!! Theme::asset('/js/placeholder.js') !!}"></script>
<script src="{!! Theme::asset('/js/main.js') !!}"></script>
<script>
    $('header').css({'display' : 'block'});
    $('#choose-lang .open-link').on('click', function(e){
        e.preventDefault();
        var container = $('#choose-lang');
        if(container.hasClass('active')){
            container.removeClass('active');
            container.find('i').attr('class', 'font-icon-globe_line');
        }else{
            container.addClass('active');
            container.find('i').attr('class','font-icon-remove')
        }
    })
</script>
@yield('scripts')