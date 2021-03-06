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
//create function query for get all top product order from view

    public function getTop($number = 1)
    {
        $sql = "SELECt * FROM products
                ORDER BY products.view DESC 
                LIMIT :number";
        $this->db->query($sql);
        $this->db->bind(':number', $number);
        return $this->db->resultSet();
    }
//create function query for add all product

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
//create function query for edit all product

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
//create function query for delete all product

    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

}
?>