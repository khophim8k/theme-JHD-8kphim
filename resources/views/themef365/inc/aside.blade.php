@foreach ($tops as $top)
    <div class="most-view block" style="margin-top: 2px; margin-bottom: 20px">
        <div class="tabs">
            <div data-id="day" class="tab active">{{ $top['label'] }}</div>
        </div>
        <div class="clear"></div>
        <ul class="list-film">
            @foreach ($top['data'] as $movie)
                <li class="film-item-ver">
                    @php
                    $watchUrl = '#';
                    if (
                        !$movie->is_copyright &&
                        count($movie->episodes) &&
                        $movie->episodes[0]['link'] != ''
                    ) {
                        $watchUrl = $movie->episodes
                            ->sortBy([['server', 'asc']])
                            ->groupBy('server')
                            ->first()
                            ->sortByDesc('name', SORT_NATURAL)
                            ->groupBy('name')
                            ->last()
                            ->sortByDesc('type')
                            ->first()
                            ->getUrl();
                    }

                @endphp
                    <a href="{{ $watchUrl}}" title="{{ $movie->name }}">
                            <img class="avatar lazyload" alt="{{ $movie->name }}" data-src="{{ $movie->getThumbUrl() }}" />
                            <div class="title">
                                <p class="name">
                                    {{ $movie->name }}</p>
                                <p class="view" style="color:#aaa;"><i class="fa fa-eye" aria-hidden="true"></i>
                                    {{ $movie->view_week }} lượt xem</p>
                            </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endforeach
