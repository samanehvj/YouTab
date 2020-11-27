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

    public function getAll()
    {
        $sql = "SELECT o.*, u.name FROM orders AS o
                JOIN users AS u 
                ON u.id=o.user_id
                ORDER BY o.id DESC";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM orders WHERE id=:id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function edit($id, $isDelivered, $isCanceled)
    {
        $sql = "UPDATE orders SET  is_delivered=:isDel, is_canceled=:isCan WHERE id=:id";
        $this->db->query($sql);
        $this->db->bind(':isDel', $isDelivered);
        $this->db->bind(':isCan', $isCanceled);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

}