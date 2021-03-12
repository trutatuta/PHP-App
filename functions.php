<?php

function validateUser(){
    $args = [
        'username' => ['filter' => FILTER_VALIDATE_REGEXP,
                    'options' => ['regexp' => '/^(?=.{3,25}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/']],
        'email' => FILTER_VALIDATE_EMAIL,
        'password_1' => ['filter' => FILTER_VALIDATE_REGEXP,
                    'options' => ['regexp' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/']],
        'password_2' => ['filter' => FILTER_VALIDATE_REGEXP,
                    'options' => ['regexp' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/']],
    ];

    $data = filter_input_array(INPUT_POST, $args);
    $errors = "";
    foreach ($data as $key => $val) {
        if ($val === false or $val === NULL) {
            $errors .= $key . " ";
        }
    }

    return [$data, $errors];
}

function checkUsername($db, $username){
    $result = $db->select("SELECT * FROM users WHERE username='$username'");
    if(isset($result["username"])){
        return TRUE;
    }else{
        return FALSE;
    }
}

function checkEmail($db, $email){
    $result = $db->select("SELECT * FROM users WHERE email='$email'");
    if(isset($result["email"])){
        return TRUE;
    }else{
        return FALSE;
    }
}

function logIn($db, $username, $password){
    $result = $db->select("SELECT email, password FROM users WHERE username='$username'");
    if(isset($result["email"]) && isset($result["password"])){
        if(password_verify($password, $result["password"])){
            return TRUE;
        }
    }

}

