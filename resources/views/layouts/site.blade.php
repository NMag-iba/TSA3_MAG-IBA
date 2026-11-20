<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            margin: 0;
            padding: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        nav {
            text-align: center;
            margin-bottom: 20px;
        }

        nav a {
            margin: 0 12px;
            color: purple;
        }

        .content {
            width: 85%;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #d3d3d3;
            padding: 9px 10px;
            text-align: left;
        }

        th {
            background-color: #d9ead3;
        }

        .box {
            border: 1px solid #d3d3d3;
            padding: 15px;
        }

        .box h2,
        .box p {
            margin: 0;
            padding: 10px;
        }

        .box h2 {
            background-color: #d9ead3;
            font-size: 18px;
        }

        .box p {
            border-top: 1px solid #d3d3d3;
        }

        button,
        a.button {
            padding: 7px 12px;
            cursor: pointer;
        }
        .link-button {
            border: none;
            background: none;
            color: purple;
            padding: 0;
            margin: 0 12px;
            font: inherit;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>@yield('heading')</h1>

    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('tasks.index') }}">Task List</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('profile') }}">Profile</a>

        @auth
            <a href="{{ route('profile.edit') }}">Settings</a>

            <form
                method="POST"
                action="{{ route('logout') }}"
                style="display: inline;"
            >
                @csrf

                <button type="submit" class="link-button">
                    Log Out
                </button>
            </form>
        @else
            <a href="{{ route('login') }}">Log In</a>
        @endauth
    </nav>

    @yield('content')
</body>
</html>