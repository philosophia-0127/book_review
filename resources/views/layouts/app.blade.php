<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bookers @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Caveat">

    <script src="https://kit.fontawesome.com/55668a3b00.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-secondary py-4 mb-4">

            <h3 class="row">
                <a href="{{ url('/') }}" class="title-logo text-light text-decoration-none ms-5">Bookers</a>
            </h3>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#drop">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="drop">
                <ul class="navbar-nav ms-auto">

                    @guest

                        <a href="{{ url('login') }}" class="text-light text-decoration-none">
                            <li class="me-3">ログイン</li>
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-light text-decoration-none">
                                <li class="me-3">新規登録</li>
                            </a>
                        @endif

                    @else

                        <a href="{{ route('user.show') }}" class="text-light text-decoration-none">
                            <li class="me-3">マイページ</li>
                        </a>

                        <a href="{{ route('logout') }}" class="text-light text-decoration-none"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <li class="me-3">ログアウト</li>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    @endguest

                </ul>
            </div>

        </nav>
    </header>

    <main class="py-4">

        @if (session('flash_message'))
            <div class="flash_message col-8 border border-success mx-auto text-center h2 py-3 mb-5">
                {{ session('flash_message') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        <div class='container mt-5'>
            <div class='row'>
                <p class="small text-center text-muted">© 2021　Ayumu Noda　All Rights Reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
