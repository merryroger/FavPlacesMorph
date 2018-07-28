<header>
    <div class="title">
        {{ $placename }}
        @if(!$empty)
            <div class="cityvote">
                <div class="pl plike" title="Место нравится"
                     onclick="markPlace('{{ route('place.like', [$placeid, 1]) }}')">{{ $place->getLikes() }}</div>
                <div class="pl pdislike"
                     title="Место не нравится"
                     onclick="markPlace('{{ route('place.like', [$placeid, 0]) }}')">{{ $place->getDisLikes() }}</div>
                <div class="pl prating" title="Рейтинг места">{{ $place->calcRating() }}</div>
            </div>
        @endif
    </div>
    <nav>
        @include('menu', ['place' => $placeid, 'cr' => Route::currentRouteName()])
    </nav>
    <br clear="all"/>
</header>
