<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body class="sign__body">
    <main class="sign__main">
        <h1>Sign Up</h1>
        <form action="/sign" method="post" class="sign__form">
            <input type="text" name="fname" class="sign__input" placeholder="Name">
            <input type="text" name="lname" class="sign__input" placeholder="Surname">
            <input type="email" name="email" class="sign__input" placeholder="Email">
            <input type="password" name="password" class="sign__input" placeholder="password">
            <input type="password" name="postPassword" class="sign__input" placeholder="repeat password">
            <button type="submit" id="sign__submit">Sign Up</button>
        </form>
    </main>
</body>
</html>
