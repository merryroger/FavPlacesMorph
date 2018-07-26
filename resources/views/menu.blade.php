@if($cr == 'place.get_form')
    <div class="mitem active"><span>Создать место</span></div>
@else
    <div class="mitem" onclick="document.location.href='{{ route('place.get_form') }}'; return false;"><span><a
                    href="{{ route('place.get_form') }}" class="latent">Создать место</a></span></div>
@endif
@if($cr == 'photo.get_linked_form' || $cr == 'photo.get_wildcard_form')
    <div class="mitem active"><span>Добавить фотографию к месту</span></div>
@elseif($cr == 'place.show_all' || $cr == 'place.get_form')
    <div class="mitem" onclick="document.location.href='{{ route('photo.get_wildcard_form') }}'; return false;"><span><a
                    href="{{ route('photo.get_wildcard_form') }}" class="latent">Добавить фотографию к месту</a></span></div>
@else
    <div class="mitem" onclick="document.location.href='{{ route('photo.get_linked_form', [$place]) }}'; return false;"><span><a
                    href="{{ route('photo.get_linked_form', [$place]) }}" class="latent">Добавить фотографию к месту</a></span></div>
@endif
@if($cr == 'place.show_all')
    <div class="mitem active"><span>Все места</span></div>
@else
    <div class="mitem" onclick="document.location.href='{{ route('place.show_all') }}'; return false;"><span><a
                    href="{{ route('place.show_all') }}" class="latent">Все места</a></span></div>
@endif
