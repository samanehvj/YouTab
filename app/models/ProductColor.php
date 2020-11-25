<?php

Class ProductColor {

    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public function getByProductId($productId)
    {
        $sql = "SELECt pc.*, c.name, c.hex 
                FROM product_colors AS pc 
                JOIN colors AS c 
                ON c.id=pc.color_id 
                WHERE pc.product_id=:productId";

        $this->db->query($sql);
        $this->db->bind(':productId', $productId);

        return $this->db->resultSet();
    }

    public function getByColorId($colorId)
    {
        $sql = "SELECt pc.*, c.name, c.hex 
                FROM product_colors AS pc 
                JOIN colors AS c 
                ON c.id=pc.color_id 
                WHERE pc.color_id=:colorId";

        $this->db->query($sql);
        $this->db->bind(':colorId', $colorId);

        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $sql = "SELECT pc.*, p.name 'product_name', c.name 'color_name', c.hex 'color_hex', cat.name 'category_name'
                FROM product_colors AS pc
                JOIN colors AS c 
                ON c.id=pc.color_id
                JOIN products AS p 
                ON p.id=pc.product_id
                JOIN categories AS cat
                ON p.category_id=cat.id
                WHERE pc.id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    public function add($productId, $colorId)
    {
        $sql = "INSERT INTO product_colors 
        (product_id, color_id) 
        values 
        (:productId, :colorId)";

        $this->db->query($sql);

        $this->db->bind(':productId', $productId);
        $this->db->bind(':colorId', $colorId);

        return $this->db->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM product_colors WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

}
?>