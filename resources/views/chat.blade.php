<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>

    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">

</head>
<body>
    <div class="container" id="app">
        <div class="row pt-2">
            <ul class="list-group col-4 offset-4">
                <li class="list-group-item active">Chat Room</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
                <input type="text" placeholder="Enter your message here..." class="form-control">
            </ul>

        </div>
    </div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
