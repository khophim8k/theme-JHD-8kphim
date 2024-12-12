@php
    $tagsRD = \Kho8k\Core\Models\Tag::inRandomOrder()->limit(8)->get();
@endphp

<div class="list-tags">
    @foreach ($tagsRD as $tag)
        <div class="tag-item" style="margin-top: 10px; margin-bottom: 10px">
            <!-- Thẻ a chứa tên của từng thẻ -->
            <a class="tag-link" href="/tu-khoa/{{ $tag->slug }}" title="{{ $tag->name }}">
                {!! mb_substr($tag->name, 0, 30, 'utf-8') !!}...
            </a>
        </div>
    @endforeach
</div>