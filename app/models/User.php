<?php

class User
{

    public $username;
    private $db;

    public function __construct()
    {
        include_once __DIR__ . '/../database.php';
        $this->db = new Database();
    }

    public function add($username, $password, $email)
    {

        $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
        $params = [
            ':username' => $username,
            ':password' => $password,
            ':email' => $email
        ];

        // Execute the query using the query method
        $this->db->query($query, $params);

        $this->username = $username;
        return $this;
    }


    public function getUsername()
    {
        return $this->username;
    }


    public function getUserByUsername($username)
    {
        $sql = "SELECT  * FROM users WHERE username =  ?";

        // Execute the query using the query method
        $query =  $this->db->query($sql, [$username]);

        if ($query->checkData() == true) {
            return $query->find();
        }


        return false;
    }



    public function getUserByUserId($id)
    {
        $sql = "SELECT  * FROM users WHERE id =  ?";

        // Execute the query using the query method
        $query =  $this->db->query($sql, [$id]);

        if ($query->checkData() == true) {
            return $query->find();
        }


        return false;
    }

    public function userLogin($username, $password)
    {

        $result = $this->getUserByUsername($username);

        if ($result && password_verify($password, $result->password)) {

            $_SESSION['user'] = $result;
            return true;
        }
        return false;
    }

    public function userRegister($username, $email, $password)
    {


        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $this->add($username,  $hashed_password, $email);
        return  $this->getUsername();
    }




    public function getUsers($user_id)
    {
        $sql = "SELECT  * FROM users WHERE id =  ?";

        // Execute the query using the query method
        $query =  $this->db->query($sql, [$user_id]);

        if ($query->checkData() == true) {
            return $query->all();
        }


        return false;
    }

    public function checkPassword($user_id, $oldpassword)
    {
        $user = $this->getUserByUserId($user_id);

        return  password_verify($oldpassword, $user->password);
    }

    public function editProfile($user_id, $username, $email, $password)
    {
        $sql = "UPDATE users SET username = ?, email = ? , password = ? WHERE id = ?";
        $params = [
            $username,
            $email,
            $password,
            $user_id
        ];

        $this->db->query($sql, $params);
    }
}
