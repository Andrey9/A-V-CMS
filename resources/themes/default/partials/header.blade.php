{!! Widget::widget__banner('homepage_banner') !!}

<!-- Header -->
<header style="display: none">
    <div class="sticky-nav">
        <a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>

        <div id="logo">
            <a id="goUp" href="{!! route('home') !!}" title="@lang('labels.home')"></a>
        </div>

        {!! Widget::widget__menu('main_menu') !!}

    </div>
</header>
<!-- End Header -->