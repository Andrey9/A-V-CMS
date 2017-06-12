@if(!empty($teachers))
    <!-- About Section -->
    <div class="page-alternate">
        <div class="container">
            <!-- Title Page -->
            <div class="row">
                <div class="span12">
                    <div class="title-page">
                        <h2 class="title">@lang('front_labels.commission')</h2>
                        {{--<h3 class="title-description">Learn About our Team &amp; Culture.</h3>--}}
                    </div>
                </div>
            </div>
            <!-- End Title Page -->

            <!-- People -->
            <div class="row">
                @foreach($teachers as $teacher)
                    <!-- Start Profile -->
                    <div class="span4 profile">
                        <a href="/">
                            <div class="image-wrap">
                                <div class="hover-wrap">
                                    <span class="overlay-img"></span>
                                    <span class="overlay-text-thumb">{!! $teacher->name !!}</span>
                                </div>
                                <img src="{!! thumb($teacher->image, 600, 700) !!}" alt="{!! $teacher->name !!}">
                            </div>
                        </a>
                    </div>
                    <!-- End Profile -->
                @endforeach
            </div>
            <!-- End People -->
        </div>
    </div>
    <!-- End About Section -->
@endif