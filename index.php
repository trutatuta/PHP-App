<?php

session_start();
$d = new DateTime('NOW');

if(!isset($_SESSION["username"])){

    include("header.php");
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