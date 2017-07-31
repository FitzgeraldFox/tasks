<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Список задач</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.0/pnotify.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.0/pnotify.brighttheme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.0/pnotify.buttons.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @yield('content')
    <script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.0/pnotify.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.0/pnotify.buttons.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
