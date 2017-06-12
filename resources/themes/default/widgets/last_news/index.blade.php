@if(!empty($list))
    <!-- About Section -->
    <div class="page-alternate">
        <div class="container">
            <!-- Title Page -->
            <div class="row">
                <div class="span12">
                    <div class="title-page">
                        <h2 class="title">@lang('labels.news')</h2>
                    </div>
                </div>
            </div>
            <!-- End Title Page -->

            <!-- People -->
            <div class="row">
                @foreach($list as $item)
                    <!-- Start Profile -->
                    <div class="span4">
                        {{--<div class="image-wrap">--}}
                            {{--<div class="hover-wrap">--}}
                                {{--<span class="overlay-img"></span>--}}
                                {{--<span class="overlay-text-thumb">{!! $item->title !!}</span>--}}
                            {{--</div>--}}
                            {{--<img src="{!! $item->image !!}" alt="{!! $item->title !!}">--}}
                        {{--</div>--}}
                        <h3 class="profile-name">{!! $item->name !!}</h3>
                        <p>{!! \Carbon::parse($item->publish_at)->format('d.m.y') !!}</p>
                        <p class="profile-description">{!! $item->getShortContent() !!}</p>
                        <a href="{!! route('news.show', ['slug' => $item->slug]) !!}">@lang('labels.read')...</a>
                    </div>
                    <!-- End Profile -->
                @endforeach
            </div>
            <a href="{!! route('news.index') !!}" class="button" style="margin-top: 20px;">@lang('labels.all_news')</a>
            <!-- End People -->
        </div>
    </div>
    <!-- End About Section -->
@endif