@if(!empty($photoalbums))
    <!-- About Section -->
    <div id="about" class="{!! $type !!}">
        <div class="container">
            <!-- Title Page -->
            <div class="row">
                <div class="span12">
                    <div class="title-page">
                        <h2 class="title">@lang('labels.photoalbums')</h2>
                    </div>
                </div>
            </div>
            <!-- End Title Page -->

            <!-- People -->
            <div class="row">
                @foreach($photoalbums as $item)
                    <!-- Start Profile -->
                    <div class="span4">
                        <a href="{!! route('photoalbum.show', ['slug' => $item->slug]) !!}">
                            <div class="image-wrap">
                                <img src="{!! $item->items[0]->image !!}" alt="{!! $item->name !!}">
                            </div>
                            <h3 class="profile-name">{!! $item->name !!}</h3>
                        </a>
                    </div>
                    <!-- End Profile -->
                @endforeach

            </div>
            <a href="{!! route('news.index') !!}" class="button" style="margin-top: 20px;">@lang('labels.all_photoalbums')</a>
            <!-- End People -->
        </div>
    </div>
    <!-- End About Section -->
@endif