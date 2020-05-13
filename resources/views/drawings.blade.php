<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drawings</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="{{ asset('img/icon-logo.png') }}" type="image/x-icon" />

    <style>
            html, body {
                background-color: #b57fd4;
                color: #0f87c4;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
                margin-top: 15px;
            }
            .title {
                font-size: 84px;
            }

            .posts {
                font-size: 24px;
                color: white;
            }
            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
                color: white;
            }
            a {
                color: white;
                text-decoration: none;
            }
            h2 {
                color: white;
            }
        </style>

</head>
<body>
    <div class="full-height">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="top-right links">
            <a href="/home">Home</a>
        </div>
        <div class="content title m-b-md">
            Drawings
        </div>

        @foreach ($posts as $post)
        <div class='posts'>
            <p class='posts'>{{$post->content}}</p>
        </div>
        <p class='posts'>{{ $post->created_at }}</p>
        <form action="/deletePost/{{$post->id}}" method="get">
            @csrf
            <button name="id" type="submit">Delete Post</button>
        </form>
        <form action="/editForm/{{$post->id}}" method="get">
            @csrf
            <button name="id" type="submit">Edit Post</button>
        </form>
        <div>
            <form action="/comment" method="post">
                @csrf
                <input type="hidden" name="author">
                <input type="submit" value="Comment">
            </form>
        </div>
        @endforeach

        <form action="/addPosts" method="post">
        @csrf
        <input type="text" name="content">
        <input type="submit" value="Create Post">
        </form>

    </div>
    
</body>
</html>