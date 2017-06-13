<!-- Footer -->
<footer>
    <p class="credits">@lang('front_labels.footer_text')</p>
</footer>
<!-- End Footer -->

<!-- Back To Top -->
<a id="back-to-top" href="#">
    <i class="font-icon-arrow-simple-up"></i>
</a>
<!-- End Back to Top -->

<div id="choose-lang">
    <a class="open-link" href="#">
        <i class="font-icon-globe_line"></i>
    </a>
    @php $url = LaravelLocalization::getNonLocalizedURL(\Request::path()); @endphp
    <div class="locales">
        <a @if(LaravelLocalization::getCurrentLocale() == 'ua') class="active" @endif href="{!! LaravelLocalization::getLocalizedURL('ua', $url) !!}">УКР</a>
        <a @if(LaravelLocalization::getCurrentLocale() == 'en') class="active" @endif href="{!! LaravelLocalization::getLocalizedURL('en', $url) !!}">ENG</a>
    </div>
</div>
