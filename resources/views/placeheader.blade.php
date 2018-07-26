<header>
    <div class="title">
        {{ $placename }}
        @if(!$empty)
            <div class="cityvote">
                <div class="pl plike" title="Место нравится"
                     onclick="document.location.href='{{ route('place.like', [$placeid, 1]) }}'; return false;">{{ $place->ratings()->where('mark', true)->count() }}</div>
                <div class="pl pdislike"
                     title="Место не нравится"
                     onclick="document.location.href='{{ route('place.like', [$placeid, 0]) }}'; return false;">{{ $place->ratings()->where('mark', false)->count() }}</div>
            </div>
        @endif
    </div>
    <nav>
        @include('menu', ['place' => $placeid, 'cr' => Route::currentRouteName()])
    </nav>
    <br clear="all"/>
</header>
