<div class="block-wrapper only-pc">
    <div id="film-hot" class="film-hot">
        @foreach ($recommendations as $movie)
            <div class="film-item ">
                @php
                    $watchUrl = '#';
                    if (!$movie->is_copyright && count($movie->episodes) && $movie->episodes[0]['link'] != '') {
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
                <a href="{{ $watchUrl }}" title="{{ $movie->name }}">
                    <div class="movie-item-film-hot">
                        <img class="lazyload" alt="thumb" src="{{ $movie->getThumbUrl() }}" />
                        @if (isset($movie->language) && $movie->language !== '')
                            <span class="label-quality" style="background: #A8005A;">{{ $movie->language }}</span>
                        @endif
                        <div class="title">
                            <div class="post-title">
                                <p class="name">{{ $movie->name }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        </div>
</div>
