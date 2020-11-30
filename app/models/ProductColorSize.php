<?php


class ProductColorSize
{
    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }
//create function getbyid  for product color size

    public function getById($id)
    {
        $sql = "SELECT pcs.*, s.name 'size_name'
                FROM product_color_sizes AS pcs
                JOIN sizes AS s 
                ON s.id=pcs.size_id 
                WHERE pcs.id=:id";

        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    public function decrease($pcsId, $qty)
    {
        $sql = "UPDATE product_color_sizes set qty=qty-:qty WHERE id=:pcsId";
        $this->db->query($sql);
        $this->db->bind(':qty', $qty);
        $this->db->bind(':pcsId', $pcsId);

        return $this->db->execute();
    }

    public function getByProductColorId($productColorId)
    {
        $sql = "SELECT pcs.*, s.name 'size_name'
                FROM product_color_sizes AS pcs
                JOIN sizes AS s 
                ON s.id=pcs.size_id 
                WHERE pcs.product_color_id=:productColorId";

        $this->db->query($sql);
        $this->db->bind(':productColorId', $productColorId);

        return $this->db->resultSet();
    }

    public function add($productColorId, $sizeId, $qty)
    {
        $sql = "INSERT INTO product_color_sizes 
        (product_color_id, size_id, qty) 
        values 
        (:productColorId, :sizeId, :qty)";

        $this->db->query($sql);

        $this->db->bind(':productColorId', $productColorId);
        $this->db->bind(':sizeId', $sizeId);
        $this->db->bind(':qty', $qty);

        return $this->db->execute();
    }

    public function edit($id, $qty)
    {
        $sql = "UPDATE product_color_sizes SET  qty=:qty WHERE id=:id";
        $this->db->query($sql);
        $this->db->bind(':qty', $qty);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM product_color_sizes WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }
}