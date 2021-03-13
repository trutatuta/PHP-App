<?php

session_start();

require("classes/DataBase.php");
require("classes/Post.php");

include("header.php");
echo $_SESSION["username"];
if(isset($_POST["logout"])){
    session_destroy();
    session_unset();
    header("Location: index.php");
    exit();
}

if(isset($_POST["newPost"])){
    $db = new \classes\DB\DataBase("localhost", "root", "", "app");
    $userInfo = $db->select("SELECT idUser FROM users WHERE username = '".$_SESSION["username"]."'");
    $post = new \classes\Post\Post($userInfo["idUser"]);
    $post->saveToDb($db);
    move_uploaded_file($_FILES["image"]["tmp_name"], 'images/'.$_FILES["image"]["name"]);
    echo "<pre>";
    print_r($post);
}


?>

<form action="home.php" method="post">
    <input type="submit" id="logout" name="logout" value="Log Out">
</form>

Create new post:
<form action="home.php" method="post" enctype="multipart/form-data">
    <input type="file" id="image" name="image"><br />
    <input type="text" id="caption" name="caption" placeholder="Caption"><br />
    <input type="submit" name="newPost" value="Create"><br />
</form>

<?php
include("footer.php");
?>
