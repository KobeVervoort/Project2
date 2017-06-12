<?php

include_once 'start.php';

session_start();
$page = 'wallet';

if(isset($_SESSION['userID'])){

} else if (isset($_SESSION['companyID'])){
    header('Location: Bazaar/company.php');
} else {
    header('Location: Bazaar/register.php');
}

?><!doctype html>
<html lang="en">
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,600,800" rel="stylesheet">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/wallet.css">
    <title>wallet</title>
</head>
<body>

    <?php include_once 'nav.inc.php'?>

    <section class="header">

        <div>

            <div class="data one">

                <h3>&euro;15,00</h3>
                <p>cash</p>

            </div>

            <div class="data two">

                <div>
                    <h3>10,00</h3>
                    <img src="img/coin.png" alt="">
                </div>

                <p>huidig</p>

            </div>

            <div class="data three">

                <div>
                    <h3>32,00</h3>
                    <img src="img/coin.png" alt="">
                </div>

                <p>huidig</p>

            </div>

        </div>

        <h1>Balans</h1>

    </section>

    <section class="main">

        <div class="payment">
            <div class="paymentInfo">
                <h2>Beenhouwerij De Bie</h2>
                <p>KVCoins</p>
            </div>
            <div class="exchange">
                <div>
                    <div>
                        <p><span>+</span>4,00</p>
                        <img src="img/coin.png" alt="">
                    </div>

                    <p class="date">27-04-2017</p>
                </div>

            </div>
        </div>

        <div class="payment">
            <div class="paymentInfo">
                <h2>Artisjok</h2>
                <p>KVCoins</p>
            </div>
            <div class="exchange">
                <div>
                    <div>
                        <p><span>+</span>6,00</p>
                        <img src="img/coin.png" alt="">
                    </div>
                </div>

                <p class="date">11-04-2017</p>

            </div>
        </div>

        <div class="payment">
            <div class="paymentInfo">
                <h2>Betaling Afas</h2>
                <p>KVCoins</p>
            </div>
            <div class="exchange">
                <div>
                    <div>
                        <p><span class="minus">-</span>7,00</p>
                        <img src="img/coin.png" alt="">
                    </div>

                    <p class="date">05-04-2017</p>

                </div>
            </div>
        </div>

        <div class="payment">
            <div class="paymentInfo">
                <h2>Opladen Afas</h2>
                <p>Maestro</p>
            </div>
            <div class="exchange">
                <div>
                    <div>
                        <p><span>+</span>29,00</p>
                        <img src="img/coin.png" alt="">
                    </div>

                    <p class="date">05-04-2017</p>

                </div>
            </div>
        </div>


    </section>

</body>
</html>