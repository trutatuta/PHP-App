<?php

namespace classes\DB;

use mysqli;

class DataBase{

    private $mysqli;

    function __construct($host, $username, $password, $db)
    {
        $this->mysqli = new mysqli($host, $username, $password, $db);

        if($this->mysqli->connect_errno){
            printf("ERROR %s\n", $this->mysqli->connect_error);
            exit();
        }
    }

    function __destruct()
    {
        $this->mysqli->close();
    }

    public function select($sql){
        $result = $this->mysqli->query($sql);
        if($result->num_rows > 0){
            return $result->fetch_assoc();
        }

    }

    public function sqlQuery($sql){
        if($this->mysqli->query($sql) !== TRUE){
            return $this->mysqli->error;
        }
    }


}