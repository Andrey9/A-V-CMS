<header>
    <div class="container">
        <a href="{!! route('home') !!}">
            <div class="logo">
                <img src="{!! $dashboard->logo !!}" alt="Programmer HPK">
            </div>
        </a>
        <button class="hamburger hamburger--spin" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
        @if ($dashboard->menu_id)
        {!! Widget::widget__menu($dashboard->menu_id, $dashboard->template) !!}
        @endif
        <script>
            $('.hamburger').on ('click', function() {
                if ($(this).hasClass('is-active')) {
                    $(this).removeClass('is-active');
                    $('.main_menu').removeClass('active')
                }
                else {
                    $(this).addClass('is-active');
                    $('.main_menu').addClass('active');
                }
            })
        </script>
    </div>
</header>