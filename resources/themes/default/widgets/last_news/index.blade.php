@if(isset($list))
    <div id="news" class="news">
        <div class="container">
            <div class="heading white">
                <h1>@lang('front_labels.news')</h1>
            </div>
            <div class="news_wrap">
                @foreach($list as $item)
                    <div class="new col-md-4">
                        <div class="news_heading">
                            <h3>{!! $item->name !!}</h3>
                        </div>
                        <div class="posted_at">
                            <p>{!! \Carbon::parse($item->publish_at)->format('d.m.y') !!}</p>
                        </div>
                        <div class="short_content">
                            <p>{!! $item->getShortContent() !!}</p>
                        </div>
                        <a href="{!! $item->getUrl() !!}">@lang('front_labels.more_details')</a>
                    </div>
                @endforeach
            </div>
            <a href="{!! route('news.index') !!}" class="show_more">@lang('front_labels.all_news')</a>
        </div>
    </div>
@endif