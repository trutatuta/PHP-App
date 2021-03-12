<?php

function validateUser(){
    $args = [
        'username' => ['filter' => FILTER_VALIDATE_REGEXP,
                    'options' => ['regexp' => '/^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/']],
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