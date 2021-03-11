<?php

session_start();

if(!isset($_SESSION["username"])){
    echo ("You must log in first");
    ?>
    <a href="from.php">Second</a>
    <?php
}else{
    header("Location: home.php");
    exit();
}

?>