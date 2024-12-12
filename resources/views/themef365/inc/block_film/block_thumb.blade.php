<div class="block-film">
    <h2 class="caption">
        <span>{{$item['label']}}</span>
        <a class="view-all" title="{{$item['label']}}" href="{{$item['link']}}">Xem thêm <i
                class="fa fa-angle-double-right"></i>
        </a>
    </h2>

    <div class="list-film">
        @foreach ($item['data'] as $movie)
            @include('themes::themef365.inc.block_film.block_thumb_item')
        @endforeach
    </div>
</div>

