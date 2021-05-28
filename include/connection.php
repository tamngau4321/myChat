<?php

require_once "../validate/Message.php";

class Database
{
    private $stmt;
    private $connect;

    public function __construct()
    {
        try {
            $this->connect = new mysqli("localhost","tamngau4321","mon3112@2002","mychat");
        }catch(Exception $e){
            myChatMessage::showMessage($e->getMessage());
        }
    }

    public function closeConn()
    {
        $this->connect = null;
    }

    public function selectData($query){
        try {
            $this->stmt = $this->connect->prepare($query);
            $this->stmt->execute();
            return $this->stmt;
        }catch(Exception $e){
            myChatMessage::showMessage($e->getMessage());
        }
    }

    public function selectDataParam($query,$param){
        try {
            $this->stmt = $this->connect->prepare($query);
            $this->stmt->bind_param("s",$param);
            $this->stmt->execute();
            return $this->stmt;
        }catch(Exception $e){
            myChatMessage::showMessage($e->getMessage());
        }
    }
    public function data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = $this->connect->real_escape_string($data);
        return $data;
    }

}
