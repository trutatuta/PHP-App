<?php

session_start();

if(!isset($_SESSION["username"])){

    include("header.php");
    ?>

    <main>
        Sign Up
        <form action="register.php" method="post">
            <input type="email" id="email" name="email" placeholder="Email"><br />
            <input type="text" id="username" name="username" placeholder="Username"><br />
            <input type="password" id="password_1" name="password_1" placeholder="Password"><br />
            <input type="password" id="password_2" name="password_2" placeholder="Confirm password"><br />
            <input type="submit" id="submit" name="submit" value="Log In"><br />
        </form> 
    </main>

    <?php
    include("footer.php");
}else{
    header("Location: home.php");
    exit();
}

?>
