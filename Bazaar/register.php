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

    } else if(!empty($_POST['emailLogin'])) {

        $email = $_POST['emailLogin'];
        $password = $_POST['passwordLogin'];

        $user = new User();

        $user->setEmail($email);
        $user->setPassword($password);

        if ($user->login() == null){

            $company = new Company();
            $company->setEmail($email);
            $company->setPassword($password);

            $companyID = $company->loginCompany();

            session_start();

            $_SESSION['companyID'] = $companyID;
            header('Location: ../index.php');

        } else {
            $userID = $user->login();

            session_start();

            $_SESSION['userID'] = $userID;
            header('Location: ../index.php');
        }

        var_dump($userID);



    } else if(!empty($_POST['address'])){

        $companyname = $_POST['companyname'];
        $email = $_POST['emailCompany'];
        $password = $_POST['passwordCompany'];
        $address = $_POST['address'];
        $city = $_POST['city'];

        $company = new Company();

        $company->setCompanyname($companyname);
        $company->setEmail($email);
        $company->setPassword($password);
        $company->setAddress($address);
        $company->setCity($city);

        $company->registerCompany();

        $companyID = $company->loginCompany();

        session_start();

        $_SESSION['companyID'] = $companyID;

        header('Location: ../index.php');

    } else {
        $error = 'Deze combinatie van email en wachtwoord bestaat niet';
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

                        <fieldset class="companyStep">

                            <button class="back" id="backFour"></button>

                            <h1>maak een profiel aan</h1>

                            <label for="emailCompany">email</label>
                            <input type="email" id="emailCompany" placeholder="email" name="emailCompany">
                            <p class="errorMessage" id="errorMailCompany"></p>

                            <label for="passwordCompany">wachtwoord</label>
                            <input type="password" id="passwordCompany" placeholder="wachtwoord" name="passwordCompany">
                            <p class="errorMessage" id="errorPasswordCompany"></p>

                            <label for="confirmPasswordCompany">bevestig wachtwoord</label>
                            <input type="password" id="confirmPasswordCompany" placeholder="bevestig wachtwoord" name="confirmPasswordCompany">
                            <p class="errorMessage" id="errorConfirmPasswordCompany"></p>

                            <button id="nextTwo" class="buttonTop">volgende</button>

                        </fieldset>

                        <fieldset class="companyStepTwo">

                            <h1>bijna klaar</h1>

                            <button class="back" id="backFive"></button>

                            <label for="companyname">bedrijfsnaam</label>
                            <input type="text" id="companyname" name="companyname" placeholder="bedrijfsnaam">
                            <p class="errorMessage" id="errorCompanyname"></p>

                            <label for="address">adres</label>
                            <input type="text" id="address" name="address" placeholder="adres">
                            <p class="errorMessage" id="errorAddress"></p>

                            <p class="cityLabel">kies een deelgemeente</p>
                            <select name="city" id="city" >
                                <option disabled selected value="1">kies</option>
                                <option value="Mechelen">Mechelen</option>
                                <option value="Heffen">Heffen</option>
                                <option value="Hombeek">Hombeek</option>
                                <option value="Leest">Leest</option>
                                <option value="Muizen">Muizen</option>
                                <option value="Walem">Walem</option>
                            </select>
                            <p class="errorMessage" id="errorCity"></p>

                            <button id="submitCompany" value="2" name="companySubmit" class="buttonTop">voltooi</button>

                        </fieldset>

                        <fieldset class="login">

                            <button class="back" id="backSix"></button>

                            <h1>Login met je e&#x2011;mailadres en wachtwoord</h1>

                            <label for="emailLogin">email</label>
                            <input type="email" id="emailLogin" name="emailLogin" placeholder="email">
                            <p class="errorMessage" id="errorEmailLogin"></p>

                            <label for="passwordLogin">wachtwoord</label>
                            <input type="password" id="passwordLogin" name="passwordLogin" placeholder="wachtwoord">
                            <p class="errorMessage" id="errorPasswordLogin"></p>

                            <button id="submitLogin" type="submit" class="buttonTop">Login</button>

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