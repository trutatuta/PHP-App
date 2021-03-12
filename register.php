<?php

session_start();

require("classes/User.php");
require("classes/DataBase.php");
require("functions.php");

if(!isset($_SESSION["username"])){

    include("header.php");
    if(isset($_POST["submit"])){
        $db = new \classes\DB\DataBase("localhost", "root", "", "app");
        list($data, $errors) = validateUser();
        if($errors){
            echo $errors;
        }else{
            if($data["password_1"] === $data["password_2"]){
                if(checkUsername($db, $data["username"]) && checkEmail($db, $data["email"])){
                    echo "Username and Email already taken <br />";
                }else if(checkEmail($db, $data["email"])){
                    echo "Email already taken <br />";
                }else if(checkUsername($db, $data["username"])){
                    echo "Username already taken <br />";
                }else{
                    $user = new \classes\User\User($data);
                    $user->saveToDb($db);
                    $_SESSION["username"] = $user->getUsername();
                    header("Location: home.php");
                    exit();
                }
            }else{
                echo "Passwords must match <br />";
            }
        }
    }
    ?>

    Sign Up
    <form action="register.php" method="post">
        <input type="email" id="email" name="email" placeholder="Email"><br />
        <input type="text" id="username" name="username" placeholder="Username"><br />
        <input type="password" id="password_1" name="password_1" placeholder="Password"><br />
        <input type="password" id="password_2" name="password_2" placeholder="Confirm password"><br />
        <input type="submit" id="submit" name="submit" value="Sign Up"><br />
    </form>
    <a href="index.php">Log In</a> 

    <?php
    include("footer.php");
}else{
    header("Location: home.php");
    exit();
}

?>
