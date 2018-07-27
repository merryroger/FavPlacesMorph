@extends('favlist')

@section('listhdr')
    @include('placeheader', ['placeid' => 0, 'placename' => 'Мои любимые места', 'empty' => true])
    <div class="listpad">
        @foreach($listset as $place)
            <div class="fpholder">
                <div class="pldata"
                     onclick="document.location.href='{{ route('place.show', [urlencode($place->id)]) }}'; return false;">
                    <div class="pl_rating" title="Рейтинг">{{ $place->calcRating() }}</div>
                    <div class="placename">{{ $place->name }}</div>
                    <div class="placetype">{{ $types[$place->placetype_id] }}</div>
                </div>
                <div class="pladdphoto" title="Добавить фотографию"
                     onclick="document.location.href='{{ route('photo.get_linked_form', [urlencode($place->id)]) }}'; return false;">
                    <div class="pictcount" title="Загружено фотографий">{{ $place->pictures->count() }}</div>
                </div>
                <br clear="all"/>
            </div>
        @endforeach
    </div>
@endsection

@section('emptyhdr')
    <div class="listpad">Мест нет</div>
    @include('placeheader', ['placeid' => 0, 'placename' => 'Мои любимые места', 'empty' => true])
@endsection