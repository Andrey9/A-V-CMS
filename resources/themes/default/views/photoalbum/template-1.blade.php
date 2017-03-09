<div id="photoalbums" class="photoalbums">
    <div class="container">
        <h1 class="heading yellow">{!! $model->title !!}</h1>
        <section class="right">
            <div class="photos">
                @foreach($model->items as $photo)
                    <div class="photo">
                        <div class="image-wrap">
                            <a href="{!! $photo->image !!}" data-lightbox="photoalbum1" class="hover-wrap">
                                <span class="overlay-img"></span>
                                <span class="overlay-text">{!! $photo->name !!}</span>
                            </a>
                            <img src="{!! $photo->image !!}" alt="{!! $photo->name !!}">
                        </div>
                        <p></p>
                    </div>
                @endforeach
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
</div>
<script>
    overlay_width_calc()
</script>