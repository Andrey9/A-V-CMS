@if(isset($menu))
    <div class="main_menu">
        @foreach($menu->visible_items as $item)
            <a href="{!! url(LaravelLocalization::getCurrentLocale().$item->link )!!}" class="menu_link">{!! $item->name !!}</a>
        @endforeach
    </div>
@endif