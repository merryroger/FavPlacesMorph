<header>
    <div class="title">
        {{ $placename }}
        @if(!$empty)
            <div class="cityvote">
                <div class="pl plike" title="Место нравится"
                     onclick="document.location.href='{{ route('place.like', [$placeid, 1]) }}'; return false;">{{ $place->getLikes() }}</div>
                <div class="pl pdislike"
                     title="Место не нравится"
                     onclick="document.location.href='{{ route('place.like', [$placeid, 0]) }}'; return false;">{{ $place->getDisLikes() }}</div>
                <div class="pl prating" title="Рейтинг места">{{ $place->calcRating() }}</div>
            </div>
        @endif
    </div>
    <nav>
        @include('menu', ['place' => $placeid, 'cr' => Route::currentRouteName()])
    </nav>
    <br clear="all"/>
</header>
