<?php
include_once "config.php";
class DBConfig
{
    private $host = HOSTNAME;
    private $user = USER;
    private $pass = PASSWORD;
    private $dbname = DBNAME;
    // Database Handler. 
    private $dbh;
    //Prepaer statement
    private $stmt;
    //Error message
    private $error;

    public function __construct(){
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true, //Not a closed connection but saved in the cache to reuse by another script
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );

        //Deal with the error and display the message.
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            //echo $this->error;
            echo "not working";
        }
    }

    //query without variables
    public function simpleQuery($query)
    {
        return $this->dbh->query($query);
    }

    //query with variables
    public function queryWithParam($query, $data)
    {
        $this->stmt = $this->dbh->prepare($query);
        $this->stmt->execute($data);
        return $this->stmt->fetch(); 
    }

    //inserting value into db
    public function insertValue($query, $data)
    {
        $this->dbh->prepare($query)->execute($data); 
    }

}

?>