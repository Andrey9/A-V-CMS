@foreach($photos as $photo)
    <div class="photo">
        <div class="image-wrap">
            <a href="{!! $photo->image !!}" data-lightbox="photoalbum1" class="hover-wrap">
                <span class="overlay-img"></span>
                <span class="overlay-text glyphincon glyphicon-plus"></span>
            </a>
            <img src="{!! $photo->image !!}" alt="{!! $photo->name !!}">
        </div>
    </div>
@endforeach