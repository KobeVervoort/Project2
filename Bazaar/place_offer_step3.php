<?php
use Bazaar\Classes\Company;
use Bazaar\Classes\Offer;
use \Bazaar\Classes\User;

include_once 'start.php';

session_start();

$page = 'placeOffer';
$stepNumber = 3;

if(isset($_SESSION['companyID'])) {

    $titleError = $descriptionError = '';
    $title = $description = '';

    if(!empty($_POST)){

        if(empty($_POST['title'])){
            $titleError = 'Je kan dit niet leeglaten';
        } else {
            $title = $_POST['title'];
        }

        if(empty($_POST['description'])){
            $descriptionError = 'Je kan dit niet leeglaten';
        } else {
            $description = $_POST['description'];
        }

        if($title != '' && $description != ''){
            $_SESSION['title'] = $title;
            $_SESSION['description'] = $description;

            header('Location: place_offer_step4.php');
        }

    }

} else if (isset($_SESSION['userID'])){
    header('Location: index.php');
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
    <link rel="stylesheet" href="css/steps.css">
    <link rel="stylesheet" href="css/placeOffer.css">
    <title>Plaats uw aanbieding</title>
</head>
<body>

    <?php include_once 'nav.inc.php'?>

    <section class="main">

        <?php include_once 'steps.inc.php'?>

        <div class="thirdStep">

            <form action="" method="post">
            <div>
                <label for="title" <?php if($titleError != ''){echo 'class="errorLabel"';};?>>titel</label>
                <br>
                <input type="text" id="title" name="title" value="<?php echo $title?>">
                <p class="errorMessage"><?php echo $titleError?></p>
            </div>

            <div>
                <label for="description" <?php if($descriptionError != ''){echo 'class="errorLabel"';};?>>beschrijving</label>
                <br>
                <textarea name="description" id="description" cols="30" rows="6" value="<?php echo $description?>"></textarea>
                <p class="errorMessage"><?php echo $descriptionError?></p>
            </div>

            <button type="submit">overzicht</button>

            </form>

        </div>

    </section>


</body>
</html>