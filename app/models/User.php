<?php


class User
{
    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM users 
        WHERE email = :email";

        $this->db->query($sql);

        $this->db->bind(":email", $email);

        $user =  $this->db->single();

        return password_verify($password, $user->password) ? $user : false;
    }
}