<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <main>
        <h2>Sign Up</h2>
        <form action="/sign" method="post" >
            <input type="text" name="fname" placeholder="Name">
            <input type="text" name="lname" placeholder="Surname">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="password">
            <input type="password" name="postPassword" placeholder="repeat password">
            <button type="submit">Sign Up</button>
        </form>
    </main>
</body>
</html>
