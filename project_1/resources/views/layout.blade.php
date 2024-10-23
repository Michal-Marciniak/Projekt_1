@php use App\Models\User;use Illuminate\Support\Facades\Session; @endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pageTitle')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="d-print-none">
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid justify-content-around">
                <a class="navbar-brand" href="{{ route('dashboard-page') }}">Dashboard</a>
                <div class="d-flex">
                    <ul class="navbar-nav">
                        @if(!Session::has('user_id'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login-form')}}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('register-form')}}">Register</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('add-event-form')}}">Add Event</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    Categories
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="{{route('add-category-form')}}">Add</a></li>
                                    <li><a class="nav-link" href="{{route('categories-list')}}">View</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    @php
                                        $user = User::findOrFail(Session::get('user_id'));
                                        $userName = explode(' ', $user->name)[0];
                                    @endphp
                                    {{ $userName }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="{{route('logout')}}">Logout</a></li>
                                    <li><a class="nav-link" href="{{route('my-account-form')}}">My Account</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container mt-5 mx-auto alert-wrapper d-print-none">
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
            </div>
        @endif
    </div>

    @yield('pageContent')

    <style>
        .alert-wrapper, .form {
            width: 30%;
            min-width: 150px;
        }
    </style>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"
    >
    </script>
</body>
</html>
