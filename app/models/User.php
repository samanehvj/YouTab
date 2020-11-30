<?php


class User
{
    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }
//get user email fromm db
    public function getByEmail($email)
    {
        $sql = "SELECT * FROM users 
        WHERE email = :email";

        $this->db->query($sql);

        $this->db->bind(":email", $email);

        return  $this->db->single();
    }

    public function add($name, $email, $password, $address = '', $postal_code = '', $phone = '')
    {
        $sql = "INSERT INTO users 
        (name, email, password, address, postal_code, phone) 
        values 
        (:name, :email, :password, :address, :postal_code, :phone)";

        $this->db->query($sql);

        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', password_hash($password, PASSWORD_DEFAULT));
        $this->db->bind(':address', $address);
        $this->db->bind(':postal_code', $postal_code);
        $this->db->bind(':phone', $phone);

        if($this->db->execute()) {
            return $this->getByEmail($email);
        }

        return false;
    }
}