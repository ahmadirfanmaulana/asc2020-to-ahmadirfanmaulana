<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Backend</title>

    <base href="../">
    <!-- Bootstrap core CSS -->
    <link href="{{url('assets/css/bootstrap.css')}}" rel="stylesheet">
    <!-- Custom styles -->
    <link href="{{url('assets/css/custom.css')}}" rel="stylesheet">
    @yield('css')
</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('events.index')}}">Event Platform</a>
    <span class="navbar-organizer w-100">{{auth()->user()->name}}</span>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" id="logout" href="index.html" onclick="event.preventDefault(); document.getElementById('form-logout').submit()">Sign out</a>
            <form action="{{route('logout')}}" id="form-logout" method="POST">@csrf</form>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">

        @yield('content')

    </div>
</div>

@yield('js')
</body>
</html>
