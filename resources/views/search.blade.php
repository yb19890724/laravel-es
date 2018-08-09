<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>es demo</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>


        <div id="app">
            <div class="col mt-5">
                <list-view></list-view>
            </div>

        </div>
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
