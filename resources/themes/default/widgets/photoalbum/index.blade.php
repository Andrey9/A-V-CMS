<div class="row">
    @foreach($photoalbums as $photoalbum)
        <div class="col-md-4">
            <a href="{!! route('photoalbums.show',$photoalbum->slug) !!}">
                <img height="200px" src="{!! $photoalbum->getImage() !!}" alt="">
            </a>
            <br>
            <p>{!! $photoalbum->name !!}</p>
        </div>
    @endforeach
</div>