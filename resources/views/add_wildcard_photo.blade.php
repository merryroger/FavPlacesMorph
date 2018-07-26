@extends('appender')

@section('title', 'Загрузка новой фотографии')

@section('hdr')
    @include('formheader', ['text' => 'Новая фотка', 'cr' => Route::currentRouteName()])
@endsection

@section('form')
    <form action="{{ route('photo.post_form') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" class="ff" tabindex="1" required autofocus/><br/>
        <select name="place_id" size="1" class="ff" tabindex="2">
            @foreach($places as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <div class="fmctrls">
            <button type="button" class="cancel" tabindex="3"
                    onclick="document.location.href='{{ route('place.show_all') }}'; return false;">Отменить
            </button>
            <button type="submit" class="do" tabindex="4">Загрузить</button>
        </div>
    </form>
@endsection
