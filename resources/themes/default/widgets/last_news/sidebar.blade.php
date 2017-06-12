@if(!empty($list))
    <h1 class="title" style="font-size: 1.5em">@lang('labels.news')</h1>
    @foreach($list as $item)
        <div class="news" style="margin-bottom: 20px">
            <h3 class="profile-name">{!! $item->name !!}</h3>
            <p>{!! \Carbon::parse($item->publish_at)->format('d.m.y') !!}</p>
            <p class="profile-description">{!! $item->getShortContent() !!}</p>
            <a href="{!! route('news.show', ['slug' => $item->slug]) !!}">@lang('labels.read')...</a>
        </div>
    @endforeach
    <a href="{!! route('news.index') !!}" class="button">@lang('labels.all_news')</a>
@endif