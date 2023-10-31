<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <H1>Register</H1>
<form action="/register" method="post">
@csrf
<input type="text" name="name" id="name">
<input type="password" name="password" id="password">
<button type="submit">Regist</button>

</form>

</body>
</html>