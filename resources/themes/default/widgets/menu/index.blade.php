@if(isset($menu))
    <div class="main_menu">
        @foreach($menu->visible_items as $item)
            <a href="{!! url(LaravelLocalization::getCurrentLocale().$item->link )!!}" class="menu_link">{!! $item->name !!}</a>
        @endforeach
        {{--<a href="#speciality" class="menu_link">Спеціальність</a>
        <a href="#commission" class="menu_link">Комісія</a>
        <a href="#collaboration" class="menu_link">Співпраця</a>
        <a href="#graduates" class="menu_link">Випускники</a>
        <a href="#photoalbums" class="menu_link">Фотоальбоми</a>
        <a href="#news" class="menu_link">Новини</a>
        <a href="#contacts" class="menu_link">Зворотній зв'язок</a>--}}
    </div>
@endif