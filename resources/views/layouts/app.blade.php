<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f4f6f9;
        }

        .navbar {
            background: #4facfe;
            padding: 15px;
            color: white;
            display: flex;
            justify-content: space-between;
        }

        .sidebar {
            width: 200px;
            background: #2c3e50;
            height: 100vh;
            position: fixed;
            color: white;
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #34495e;
        }

        .content {
            margin-left: 200px;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        button {
            padding: 8px 15px;
            background: red;
            border: none;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div>My App</div>
    <div>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</div>

<div class="sidebar">
    <a href="/dashboard">Dashboard</a>
    <a href="/caesar">Caesar Cipher</a>
</div>

<div class="content">
    @yield('content')
</div>

</body>
</html>