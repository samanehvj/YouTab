<?php


class ProductColorImage
{
    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }
//create function getbyid  for product color image

    public function getById($id)
    {
        $sql = "SELECT * FROM product_color_imgs WHERE id=:id";

        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->single();
    }


    public function getOneByProductColorId($pcId)
    {
        $sql = "SELECt * FROM product_color_imgs WHERE product_color_id=:pcId LIMIT 1";
        $this->db->query($sql);
        $this->db->bind(':pcId', $pcId);

        return $this->db->single();
    }

    public function getByProductColorId($productColorId)
    {
        $sql = "SELECT * FROM product_color_imgs WHERE product_color_id=:productColorId";

        $this->db->query($sql);
        $this->db->bind(':productColorId', $productColorId);

        return $this->db->resultSet();
    }

    public function add($productColorId, $img)
    {
        $sql = "INSERT INTO product_color_imgs 
        (product_color_id, img) 
        values 
        (:productColorId, :img)";

        $this->db->query($sql);

        $this->db->bind(':productColorId', $productColorId);
        $this->db->bind(':img', $img);

        return $this->db->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM product_color_imgs WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }
}