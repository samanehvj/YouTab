<?php


class Order
{
    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public function add($userId, $price)
    {
        $sql = "INSERT INTO orders (user_id, total_price) values (:userId, :price)";

        $this->db->query($sql);

        $this->db->bind(':userId', $userId);
        $this->db->bind(':price', $price);

        return $this->db->execute();
    }

    public function getLastByUserId($userId)
    {
        $sql = "SELECT * FROM orders WHERE user_id=:userId ORDER BY id DESC";
        $this->db->query($sql);
        $this->db->bind(':userId', $userId);

        return $this->db->single();
    }

}