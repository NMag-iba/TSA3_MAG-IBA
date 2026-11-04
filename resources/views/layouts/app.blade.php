<!DOCTYPE html>
<html>
<head>
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

        th, td {
            border: 1px solid #d3d3d3;
            padding: 9px 10px;
            text-align: left;
        }

        th {
            background-color: #d9ead3;
        }

        .box {
            border: 1px solid #d3d3d3;
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
    </style>
</head>
<body>

    <h1>@yield('heading')</h1>

    <nav>
        <a href="/">Home</a>
        <a href="/tasks">Task List</a>
        <a href="/profile">Profile</a>
        <a href="/about">About</a>
    </nav>

    @yield('content')

</body>
</html>