@if(!empty($menu))
    <nav id="menu">
        <ul id="menu-nav">
            @foreach($menu->visible_items as $item)
                <li {{--class="current"--}}><a href="{!! url(LaravelLocalization::getCurrentLocale().$item->link )!!}">{!! $item->name !!}</a></li>
            @endforeach
        </ul>
    </nav>
@endif