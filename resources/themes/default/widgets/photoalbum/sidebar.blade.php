@if(!empty($photoalbums))
    <h1 class="title" style="font-size: 1.5em">@lang('labels.photoalbums')</h1>
    @foreach($photoalbums as $item)
        <div class="news" style="margin-bottom: 20px">
            <a href="{!! route('photoalbum.show', ['slug' => $item->slug]) !!}">
                <div class="image-wrap">
                    <img src="{!! $item->items[0]->image !!}" alt="{!! $item->name !!}">
                </div>
                <h3 class="profile-name" style="font-size: 0.9em">{!! $item->name !!}</h3>
            </a>
        </div>
    @endforeach
    <a href="{!! route('photoalbum.index') !!}" class="button">@lang('labels.all_photoalbums')</a>
@endif