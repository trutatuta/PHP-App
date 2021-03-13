<?php

namespace classes\Post;

use DateTime;

class Post{
    protected $idUser;
    protected $image;
    protected $dateOfCreate;
    protected $caption;


    function __construct($userId)
    {
        $this->idUser = $userId;
        $this->image = $_FILES["image"]["name"];
        $d = new DateTime('NOW');
        $this->dateOfCreate = $d->format('Y-m-d H:i:s');
        $this->caption = $_POST["caption"];
    }

    public function saveToDb($db){
        echo $db->sqlQuery("INSERT INTO posts (idUser, caption, image, dateOfCreate)
                     VALUES ('$this->idUser', '$this->caption', '$this->image', '$this->dateOfCreate')");
    }
}

?>