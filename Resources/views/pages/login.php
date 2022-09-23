<?php
    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <title>Login | Cogip Enterprise</title>
</head>
<body class="login__body">
    <main class="login__main">
        <h1>Login</h1>
        <form action="/login" method="post" class="login__form">
            <input type="email" name="email" class="login__input" placeholder="E-mail">
            <input type="password" name="password" class="login__input" placeholder="Password">
            <button type="submit" id="login__submit">Login</button>
        </form>
    </main>
</body>
</html>


