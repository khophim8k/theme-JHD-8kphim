<div id="header" class="only-pc">
    <div class="wrap cf">
        <a class="logo" href="/" title="{{$title}}">
            @if ($logo)
                {!! $logo !!}
            @else
                {!! $brand !!}
            @endif
        </a>
        <div id="main-menu" class="desktop">
            <div class="menu">
                <ul>
                    @foreach ($menu as $item)
                        @if (count($item['children']))
                            <li>
                                <a href="javascript:void(0)" title="{{$item['name']}}">
                                    <span>{{$item['name']}} <i class="fa fa-caret-down"></i></span>
                                </a>
                                <ul class="sub-menu span-2 absolute">
                                    @foreach ($item['children'] as $children)
                                        <li class="sub-menu-item"><a href="{{$children['link']}}">{{$children['name']}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="{{$item['link']}}" title="{{$item['name']}}">
                                    <span>{{$item['name']}}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="search-container relative">
            <form method="GET" action="/" class="form-search">
                <input id="keyword" type="text" name="search" placeholder="Tìm kiếm phim..." value="{{ request('search') }}" />
                <i class="fa fa-search" id="search-icon" style="cursor:pointer"></i>
            </form>
        </div>
        
    </div>
</div>

