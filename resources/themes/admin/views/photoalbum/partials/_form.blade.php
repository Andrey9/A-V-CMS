@include('photoalbum.partials._buttons', ['class' => 'buttons-top'])

<div class="row">
    <div class="col-md-12">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                @foreach (config('app.locales') as $key => $locale)
                    <li @if ($key == 0) class="active" @endif>
                        <a aria-expanded="false" href="#tab_{!! $locale !!}" data-toggle="tab">
                            <i class="flag flag-{!! $locale !!}"></i>
                            @lang('labels.tab_'.$locale)
                        </a>
                    </li>
                @endforeach

                <li>
                    <a aria-expanded="false" href="#general" data-toggle="tab">@lang('labels.tab_general')</a>
                </li>

                <li>
                    <a aria-expanded="false" href="#items" data-toggle="tab">@lang('labels.tab_items')</a>
                </li>
            </ul>

            <div class="tab-content">
                @foreach (config('app.locales') as $key => $locale)
                    <div class="tab-pane fade in @if ($key == 0) active @endif" id="tab_{!! $locale !!}">
                        @include('views.photoalbum.tabs.locale')
                    </div>
                @endforeach

                <div class="tab-pane" id="general">
                    @include('photoalbum.tabs.general')
                </div>

                <div class="tab-pane" id="items">
                    @include('photoalbum.tabs.items')
                </div>
            </div>
        </div>

    </div>
</div>

@include('photoalbum.partials._buttons')