<?php

namespace classes\User;

use DateTime;

class User{
    const STATUS_USER = 1;
    const STATUS_ADMIN = 2;

    protected $username;
    protected $email;
    protected $password;
    protected $dateOfCreation;
    protected $status;

    function __construct($data)
    {
        $this->username = $data["username"];
        $this->email = $data["email"];
        $this->password = password_hash($data["password_1"], PASSWORD_DEFAULT);
        $d = new DateTime('NOW');
        $this->dateOfCreation = $d->format('Y-m-d H:i:s');
        $this->status = User::STATUS_USER;
    }

    
}