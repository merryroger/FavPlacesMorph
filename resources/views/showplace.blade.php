@extends('favlist')

@section('listhdr')
    @include('placeheader', ['placeid' => $place->id, 'placename' => $place->name, 'empty' => false])
    <div class="listpad">
        @foreach($listset as $item)
            <div class="photoframe"
                 style="background: #ffffff url('{{ $item->location }}') no-repeat top left; background-size: 100% auto; height: {{ round(800*$item->height/$item->width) }}px;">
                <div class="photodata">{{ $item->created_at->format('d.m.Y H:i:s') }}</div>
                <div class="photodata ph_{{ $item->id }}">
                    <div class="ll like" title="Нравится"
                         onclick="markPhoto('{{ route('photo.like', [$item->id, 1]) }}')">{{ $item->getLikes() }}</div>
                    <div class="ll dislike"
                         title="Не нравится"
                         onclick="markPhoto('{{ route('photo.like', [$item->id, 0]) }}')">{{ $item->getDisLikes() }}</div>
                    <div class="ll ph_rating" title="Рейтинг">{{ $item->calcRating() }}</div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('emptyhdr')
    <div class="listpad">Нет фотографий</div>
    @include('placeheader', ['placeid' => $place->id, 'placename' => $place->name, 'empty' => true])
@endsection