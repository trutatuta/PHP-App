<?php

session_start();

require("classes/DataBase.php");
require("functions.php");

if(!isset($_SESSION["username"])){

    include("header.php");
    if(isset($_POST["submit"])){
        $db = new \classes\DB\DataBase("localhost", "root", "", "app");
        if(logIn($db, $_POST["username"], $_POST["password"])){
            $_SESSION["username"] = $_POST["username"];
            header("Location: home.php");
            exit();
        }else{
            echo "Username or password is incorect <br />";
        }
    }
    ?>


    <form action="index.php" method="post">
        <input type="text" id="username" name="username" placeholder="Username"><br />
        <input type="password" id="password" name="password" placeholder="Password"><br />
        <input type="submit" id="submit" name="submit" value="Log In"><br />
    </form>

    <a href="register.php">Create New Account</a>

    <?php
    include("footer.php");
}else{
    header("Location: home.php");
    exit();
}

?>