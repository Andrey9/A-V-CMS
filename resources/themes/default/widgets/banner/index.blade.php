<!-- Homepage Slider -->
@if(route_is('home'))
    @if(isset($banner))
        <div id="home-slider">
            <div class="overlay"></div>

            <div class="slider-text">
                <div id="slidecaption"></div>
            </div>

            <div class="control-nav">
                <a id="prevslide" class="load-item"><i class="font-icon-arrow-simple-left"></i></a>
                <a id="nextslide" class="load-item"><i class="font-icon-arrow-simple-right"></i></a>
                <ul id="slide-list"></ul>

                <a id="nextsection" href="#content"><i class="font-icon-arrow-simple-down"></i></a>
            </div>
        </div>
    @endif
@endif
<script>
    var sliderImages = [];

    @if(isset($banner) && route_is('home'))
        @foreach($banner->visible_items as $item)
            sliderImages.push({image : '{!! $item->image !!}', title : '<div class="slide-content">{!! $item->title !!}</div>', thumb : '', url : ''});
        @endforeach
    @else
        sliderImages.push({image: '', title: '', thumb: '', url: ''});
    @endif
</script>
<!-- End Homepage Slider -->