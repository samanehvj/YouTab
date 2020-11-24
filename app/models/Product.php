<?php

Class Product {

    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public function getAll()
    {
        $sql = "SELECt * FROM products";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $sql = "SELECt * FROM products WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    public function add($name, $price, $catId)
    {
        $sql = "INSERT INTO products 
        (name, price, category_id) 
        values 
        (:name, :price, :catId)";

        $this->db->query($sql);

        $this->db->bind(':name', $name);
        $this->db->bind(':price', $price);
        $this->db->bind(':catId', $catId);

        return $this->db->execute();
    }

    public function edit($id, $name, $price, $catId)
    {
        $sql = "UPDATE products SET  name=:name, price=:price, category_id=:catId WHERE id=:id";
        $this->db->query($sql);
        $this->db->bind(':name', $name);
        $this->db->bind(':price', $price);
        $this->db->bind(':id', $id);
        $this->db->bind(':catId', $catId);

        return $this->db->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

}
?>