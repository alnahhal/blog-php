<?php

class Database
{

    public $conn;
    private $statement;

    public function __construct()
    {

        $dsn = 'mysql:host=localhost;dbname=blog;charset=utf8';
        $this->conn = new PDO($dsn, 'alnahhal', '123456');
    }

    public function query($query, $params = [])
    {

        $this->statement = $this->conn->prepare($query);
        $this->statement->execute($params);
        return  $this;
    }

    public function checkData()
    {

        // Check if the query was successful
        if ($this->statement->rowCount() > 0) {
            // Return true if the user was inserted successfully
            return true;
        } else {
            // Return false if the user was not inserted
            return false;
        }
    }
    public function find()
    {

        return  $this->statement->fetch(PDO::FETCH_OBJ);
    }


    public function findOrFail()
    {

        $result =  $this->find();

        if (!$result) {
            abort();
        }

        return $result;
    }


    public function all()
    {

        return  $this->statement->fetchAll(PDO::FETCH_OBJ);
    }
}
