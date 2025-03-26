<?php

class User{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Register user
    public function register($data){
        $this->$db->query('INSERT INTO users ( username, email, password) VALUES (:username, :email, :password)');
        // Bind values
        $this->db->bind(':username' , $data['username']);
        $this->db->bind(':email' , $data['email']);
        $this->db->bind(':password' , password_hash($data['password'], PASSWORD_DEFAULT));

        // Execute
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }


    }
    // login user
    public function login($username, $password){
        $this->db->query('SELECT *FROM users WHERE username = :username');
        $this->db->bind(':username' , $username);

        $row = $this->db->single();
        if($row){
            $hashed_password = $row->password;
            if (password_verify($hashed_password)){
                return $row;
            }else{
                return false;
            }
        }else {
            return false;
        }

    }
    // find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT *FROM users WHERE email = :email');
        $this->db->bind(':email' , $email);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0 ){
            return true;
        }else{
            return false;
        }
    }
    // find user by username
    
    public function findUserByUsername($username){
        $this->db->query('SELECT *FROM users WHERE username = :username');
        $this->db->bind(':username' , $username);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0 ){
            return true;
        }else{
            return false;
        }
    }
    // get user by ID
    public function GetUserByID($id){
        $this->db->query('SELECT *FROM users WHERE id = :id');
        $this->db->bind(':id' , $id);

        $row = $this->db->single();
    }
}