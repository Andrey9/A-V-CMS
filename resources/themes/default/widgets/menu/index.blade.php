@foreach($menu->visible_items as $item)
    <a href="{!! url(LaravelLocalization::getCurrentLocale().$item->link )!!}">{!! $item->name !!}</a>
@endforeach