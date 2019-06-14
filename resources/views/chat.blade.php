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
    <style>
        .chat_list {
            overflow: auto;
            display: flex;
            flex-direction: column-reverse;
            height: 200px;
        }
    </style>

</head>
<body>
<div class="container" id="app">
    <div class="row pt-2">
        <div class="col-4 offset-4">
            <li class="list-group-item active">Chat Room
                <span class="badge-pill badge badge-danger">@{{ users }}</span>
            </li>
            <ul class="list-group chat_list">

                <message v-for="value,index in chat.message" name="message" :user=chat.user[index] :key=value.index
                         :color=chat.color[index]>@{{ value }}
                </message>
                {{--                    <small class="badge badge-pill badge-primary" >@{{ timing }}</small>--}}

            </ul>
            <div>
                <small class="badge badge-pill badge-primary">@{{ typing }}</small>
            </div>
            <input @keyup.enter="send" v-model="message" type="text" placeholder="Enter your message here..."
                   class="form-control">

        </div>


    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>

</body>
</html>
