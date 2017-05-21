<?php

header('Content-Type: application/json');

include_once '../start.php';

use \Bazaar\Classes\User;
use \Bazaar\Classes\Company;

if(!empty($_POST)){

    $user = new User();
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);

    if($user->canLogin()){
        $feedback = [
            'code' => 200,
            'canLogin' => true
        ];
    } else {

        $company = new Company();
        $company->setEmail($_POST['email']);
        $company->setPassword($_POST['password']);

        if($company->canLoginCompany()){
            $feedback = [
                'code' => 200,
                'canLogin' => true
            ];
        } else {
            $feedback = [
                'code' => 200,
                'canLogin' => false
            ];
        }


    }

    echo json_encode($feedback);

}