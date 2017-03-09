<div class="wide-container">
    <div id="slides-{!! $model->id !!}">
        <ul class="slides-container">
            @foreach($model->visible_items as $item)
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
<script>
    $(function() {
        $('#slides-{!! $model->id !!}').superslides({
            inherit_width_from: '.wide-container',
            inherit_height_from: '.wide-container'
        });
    });
</script>