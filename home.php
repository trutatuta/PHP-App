<?php

session_start();

include("header.php");
echo $_SESSION["username"];
if(isset($_POST["logout"])){
    session_destroy();
    session_unset();
    header("Location: index.php");
    exit();
}
?>

<form action="home.php" method="post">
    <input type="submit" id="logout" name="logout" value="Log Out">
</form>

<?php
include("footer.php");
?>
