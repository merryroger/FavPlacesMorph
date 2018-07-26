<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Infant|El+Messiri|Fira+Sans+Extra+Condensed"
          rel="stylesheet">
    <link rel="stylesheet" href="/css/default.css" type="text/css">
    <link rel="stylesheet" href="/css/forms.css" type="text/css">
</head>
<body>
    @yield('hdr')
    @yield('form')
    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <span>{{ $error }}</span>
            @endforeach
        </div>
    @endif
</body>
</html>
