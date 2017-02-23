@if(isset($banner))
    <div class="wide-container">
        <div id="slides">
            <ul class="slides-container">
                @foreach($banner->visible_items as $item)
                    <li>
                        <img src="{!! $item->image !!}">
                    </li>
                @endforeach
            </ul>

            <nav class="slides-navigation">
                <a href="#" class="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                <a href="#" class="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            </nav>
        </div>
    </div>
@endif