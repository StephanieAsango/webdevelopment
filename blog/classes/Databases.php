<?php

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $name = DB_NAME;

    private $conn;
    private $stmt;
    private $error;

    public function __construct(){
        // Sed DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create PDO instance
        try{
            $this->$conn = new PDO($dsn, $this->user, $this->pass, $options);
        }catch (PDOException $e){
            $this->error = $e->getMessage();
            echo "Connection Error; " . $this->error;
        }
    }
    // Prepare statement with query
    public function query($sql){
        $this->stmt =$this->conn->prepare($sql);
    }

    //Bind values
    public function bind($param, $value, $type = null){
        if (is_null($type)){
            switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
                
            }$this->stmt->bindvalue($param, $value, $type);
    }

    // Execute the prepared statement
    public function execute(){
        return $this->execute();

    }
    // Get result set as an array of objects
    public function resultSet(){
        return $this->execute();
        return $this ->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single record as object
    public function single(){
        return $this->execute();
        return $this ->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count
    public function rowCount(){
        return $this ->stmt->rowCount();
    }

    // Get last insert id
    public function lastInsertId(){
        return $this ->stmt->lastInsertId();
    }

}





