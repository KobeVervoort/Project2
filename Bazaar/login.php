<?php

use \Bazaar\Classes\User;

include_once 'start.php';

$page = 'login';

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,600,800" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>

    <form action="">

        <label for="email">email</label>
        <input type="email" id="email" placeholder="email">

        <label for="password">wachtwoord</label>
        <input type="password" id="password" placeholder="password">

        <button type="submit" id="btnLogin">login</button>

    </form>

    <a href="register.php">registreer</a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>

        $(document).ready(function(){
            var form = $('form');
            form.on('click', function (e) {
                var element = event.target;
                var id = element.id;
                var inputLabel = $("label[for = " + id + "]");
                inputLabel.animate({"opacity": "1"}, {queue: false, duration: 300});
                inputLabel.animate({"top": "0"}, 150);
                element.placeholder = "";
            })
        });

    </script>

</body>
</html>