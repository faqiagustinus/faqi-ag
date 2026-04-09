<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

   <style>

body {
    margin: 0;
    font-family: Arial;
    min-height: 100vh;
    background: linear-gradient(-45deg, #4facfe, #00f2fe, #667eea, #764ba2);
    background-size: 400% 400%;
    animation: gradientMove 12s ease infinite;
}

/* Background bergerak */
@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Navbar */
.navbar {
    background: rgba(79, 172, 254, 0.95);
    padding: 15px;
    color: white;
    display: flex;
    justify-content: space-between;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    position: relative;
    z-index: 1000;
}

/* Sidebar */
.sidebar {
    width: 200px;
    background: rgba(44, 62, 80, 0.95);
    height: 100vh;
    position: fixed;
    color: white;
    padding-top: 20px;
    z-index: 1000;
}

/* Sidebar link */
.sidebar a {
    display: block;
    color: white;
    padding: 12px 15px;
    text-decoration: none;
    transition: 0.3s;
}

.sidebar a:hover {
    background: rgba(255,255,255,0.1);
    padding-left: 20px;
}

/* Content */
.content {
    margin-left: 200px;
    padding: 20px;
    position: relative;
    z-index: 10;
}

/* Card */
.card {
    background: rgba(255,255,255,0.95);
    padding: 20px;
    margin-top: 20px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-5px);
}

/* Button */
button {
    padding: 8px 15px;
    background: #ff4d4d;
    border: none;
    color: white;
    cursor: pointer;
    border-radius: 5px;
}

button:hover {
    background: #e60000;
}
.logout-bottom {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 9999; /* ini yang penting */
}

.logout-bottom button {
    background: #ff4d4d;
    padding: 10px 18px;
    border-radius: 8px;
    cursor: pointer;
}

.logout-bottom button:hover {
    background: #e60000;
}
</style>
</head>
<body>





<div class="content">
    @yield('content')
</div>
<div class="logout-bottom">
    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
</div>
</body>
</html>