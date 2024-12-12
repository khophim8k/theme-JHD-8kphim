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

<div class="film-item no-margin-right">
    <a class="movie-items" href="{{ $watchUrl }}" title="{{ $movie->name }}">
        <div class="movie-item-wrapper">
            <img class="lazyload" alt="thumb" data-src="{{ $movie->getThumbUrl() }}" />
            <div class="title">
                <div class="post-title">
                    @if (isset($movie->language) && $movie->language !== '')
                        <span class="label-quality" style="background: #f32b8e;">{{ $movie->language }}</span>
                    @endif
                    {{-- <p class="label-view">{{ $movie->view_total }}</p> --}}
                    <p class="name">{{ $movie->name }}</p>
                </div>
            </div>            
        </div>
    </a>
</div>
