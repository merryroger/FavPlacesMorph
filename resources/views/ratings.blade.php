@extends('favlist')

@section('listhdr')
    @include('placeheader', ['placeid' => 0, 'placename' => 'Рейтинги', 'empty' => true])
    <div class="rt_pad">
        <div class="rtc">
            <table class="rating">
                <caption>Места</caption>
                <tr>
                    <th class="th_rating"></th>
                    <th class="th_rateditem">Место</th>
                </tr>
                @foreach($rates as $lid => $rate)
                    <tr class="rt_item_row" onclick="document.location.href = '{{ route('place.show', $listset[$lid]->id) }}'">
                        <td class="td_rating">{{ $rate }}</td>
                        <td><span>{{ $listset[$lid]->name }}</span></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="rtc">
            <table class="rating">
                <caption>Фотографии</caption>
                <tr>
                    <th class="th_rating"></th>
                    <th class="th_rateditem">Фотография</th>
                </tr>
                @foreach($ph_rates as $lid => $rate)
                    <tr>
                        <td class="td_rating">{{ $rate }}</td>
                        <td>#{{ $photoset[$lid]->id }} @ {{ $photoset[$lid]->place->name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
