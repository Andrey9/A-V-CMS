@if(isset($photoalbums))
    <div id="photoalbums" class="photoalbums">
        <div class="container">
            <h1 class="heading yellow">@lang('front_labels.photoalbums')</h1>
            <section class="left">
                <div class="menu">
                    @foreach($photoalbums as $photoalbum)
                        <a class="get_first_photos" data-id="{!! $photoalbum->id !!}" href="{!! route('photoalbums.show',$photoalbum->slug) !!}">{!! $photoalbum->name !!}</a>
                    @endforeach
                </div>
            </section>
            <section class="right">
                <div class="photos" id="first_photos">
                </div>
            </section>
            <div class="clearfix"></div>
            <a href="#" id="show_full_album" class="show_more">@lang('front_labels.full_album')</a>
        </div>
    </div>
@endif