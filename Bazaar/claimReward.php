<?php

use Bazaar\Classes\Company;
use Bazaar\Classes\Offer;

include_once 'start.php';

session_start();

if(isset($_SESSION['userID'])){

    $userID = $_SESSION['userID'];
    $offerID = $_GET['offerid'];
}

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,600,800" rel="stylesheet">
    <link rel="stylesheet" href="css/claimReward.css">
    <title>Claim</title>
</head>
<body>

    <img src="img/qr.jpg" alt="">
    <button class="scan"></button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>

        $(document).ready(function () {
            $('.scan').on('click', function (e) {
                e.preventDefault();
                var userID = <?php echo $userID ;?>;
                var offerID = <?php echo $offerID;?>;

                var data = {
                    userID: userID,
                    offerID: offerID
                };

                $.ajax({
                    method: 'POST',
                    url: 'ajax/claimReward.php',
                    data: data
                }).done(function (response) {
                    if(response.code == 200){
                        window.location.replace('offer.php?offerid=<?php echo $offerID;?>');
                    } else {
                        console.log('Something went wrong');
                    }
                })
            })
        })

    </script>

</body>
</html>