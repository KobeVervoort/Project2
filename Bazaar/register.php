<?php
use \Bazaar\Classes\User;
use \Bazaar\Classes\Company;

include_once 'start.php';

$page = 'login';

if(!empty($_POST)){

    if(!empty($_POST['firstname'])){

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setFirstname($firstname);
        $user->setLastname($lastname);

        $user->register();

        $userID = $user->login();

        session_start();

        $_SESSION['userID'] = $userID;

        header('Location: ../index.php');

    } else {

    }
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
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>

    <section class="background">

    </section>

    <section class="register">

        <div id="blur">

            <div id="darkOverlay">

                <img src="img/logo.png" alt="" class="logo">

                <div id="buttonContainer">

                    <form action="" method="post">

                        <fieldset class="loginOrRegister">

                            <button class="buttonTop" id="register">Registreer</button>

                            <button class="buttonBottom" id="login">Login</button>

                        </fieldset>

                        <fieldset class="firstStep">

                            <button class="back" id="backOne"></button>

                            <h1 id="fanOrBusiness">ga verder als supporter of als handelaar</h1>

                            <button id="buttonFan" class="buttonTop">supporter</button>

                            <button id="buttonBusiness" class="buttonBottom">handelaar</button>

                        </fieldset>

                        <fieldset class="fanStep">

                            <button class="back" id="backTwo"></button>

                            <h1>maak een profiel aan</h1>

                            <label for="email">email</label>
                            <input type="email" id="email" placeholder="email" name="email">
                            <p class="errorMessage" id="errorMailFan"></p>

                            <label for="password">wachtwoord</label>
                            <input type="password" id="password" placeholder="wachtwoord" name="password">
                            <p class="errorMessage" id="errorPasswordFan"></p>

                            <label for="confirmPassword">bevestig wachtwoord</label>
                            <input type="password" id="confirmPassword" placeholder="bevestig wachtwoord" name="confirmPassword">
                            <p class="errorMessage" id="errorConfirmPasswordFan"></p>

                            <button id="next" class="buttonTop">volgende</button>

                        </fieldset>

                        <fieldset class="fanStepTwo">

                            <button class="back" id="backThree"></button>

                            <h1>bijna klaar</h1>

                            <label for="firstname">voornaam</label>
                            <input type="text" id="firstname" name="firstname" placeholder="voornaam">
                            <p class="errorMessage" id="errorFirstname"></p>

                            <label for="lastname">naam</label>
                            <input type="text" id="lastname" name="lastname" placeholder="naam">
                            <p class="errorMessage" id="errorLastname"></p>

                            <button type="submit" id="fanSubmit" name="fanSubmit" class="buttonTop">voltooi</button>

                        </fieldset>

                        <fieldset class="businessStep">

                            <label for="companyname">bedrijfsnaam</label>
                            <input type="text" id="companyname" name="companyname" placeholder="bedrijfsnaam">

                            <label for="address">adres</label>
                            <input type="text" id="address" name="address" placeholder="adres">

                            <legend >deelgemeente</legend>

                            <p>deelgemeente</p>
                            <select name="city" id="city" >
                                <option disabled selected value="1">Maak een keuze</option>
                                <option value="2">Mechelen</option>
                                <option value="3">Heffen</option>
                                <option value="4">Hombeek</option>
                                <option value="5">Leest</option>
                                <option value="6">Muizen</option>
                                <option value="7">Walem</option>
                            </select>

                            <label for="vat">BTW-nummer</label>
                            <input type="number" id="vat" name="vat" placeholder="BTW-nummer">

                            <button id="submitBusiness" value="2" name="companySubmit">voltooi</button>

                            <button id="previousThree">vorige</button>

                        </fieldset>

                    </form>

                </div>

            </div>

        </div>

    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/form.js"></script>

</body>
</html>