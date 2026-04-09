<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengguna</title>
</head>
<body>

<h2>dashboard</h2>

<p>Login berhasil</p>
<p>Selamat datang {{ session('user') }}</p>

<form action="/logout" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>

</body>
</html>