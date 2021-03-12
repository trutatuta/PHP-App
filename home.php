<?php

session_start();

echo $_SESSION["username"];
if(isset($_POST["logout"])){
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
include("header.php");
?>

<form action="home.php" method="post">
    <input type="submit" id="logout" name="logout" value="Log Out">
</form>

<?php
include("footer.php");
?>
