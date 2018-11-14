<?php
require_once("new_config.php");

class Database{
    
    public $connection;
    public $db;
    
    function __construct(){
        $this->db = $this->openDbConnection();
    }
    
    public function openDbConnection(){
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($this->connection->connect_errno){
            die("Database Connection Failed " . $this->connection->connect_error);
        }
        return $this->connection;
    }
    
    public function escapeString($string){
        return $this->db->real_escape_string(trim($string));
    }
    
    public function query($sql){
        $result = $this->db->query($sql);
        $this->confirmQuery($result);
        return $result;
    }
    
    private function confirmQuery($result){
        if(!$result){
            die("Query Failed " . $this->db->error);
        }
    }
    
    public function theInsertId(){
        return mysqli_insert_id($this->connection);
    }
}

$database = new Database();
?>