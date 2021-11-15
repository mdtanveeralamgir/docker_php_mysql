<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "../db/DBconfig.php";
class Model extends DBConfig
{
    
    public function getAllData()
    {
       return $this->simpleQuery("SELECT * FROM notes");
    }

    
}
?>