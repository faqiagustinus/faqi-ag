<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI, sans-serif;
}

body{
height:100vh;
background: linear-gradient(135deg,#4facfe,#00f2fe);
display:flex;
justify-content:center;
align-items:center;
}

.login-box{
background: rgba(0, 0, 0, 0.18);
padding:40px;
border-radius:15px;
width:350px;
box-shadow:0 20px 40px rgba(0,0,0,0.2);
animation:fadeIn .6s ease;
}

@keyframes fadeIn{
from{
opacity:0;
transform:translateY(20px);
}
to{
opacity:1;
transform:translateY(0);
}
}

h2{
text-align:center;
margin-bottom:20px;
}

input{
width:100%;
padding:12px;
margin-top:12px;
border-radius:8px;
border:1px solid #ddd;
}

button{
width:100%;
padding:12px;
margin-top:20px;
border:none;
background:#4facfe;
color:white;
border-radius:8px;
cursor:pointer;
transition:.3s;
}

button:hover{
background:#00c6ff;
}

.error{
color:red;
text-align:center;
margin-bottom:10px;
}

.footer{
text-align:center;
margin-top:15px;
font-size:13px;
color:#777;
}

</style>

</head>
<body>

<div class="login-box">

<h2>Login</h2>

@if(session('error'))
<p class="error">{{ session('error') }}</p>
@endif

<form method="POST" action="/login">
@csrf

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit">Masuk</button>

</form>

<div class="footer">
Sistem Login Laravel
</div>

</div>

</body>
</html>