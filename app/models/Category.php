<?php

Class Category {

    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public function getAll()
    {
        $sql = "SELECt * FROM categories";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $sql = "SELECt * FROM categories WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    public function add($name, $image, $info = '')
    {
        $sql = "INSERT INTO categories 
        (name, img, info) 
        values 
        (:name, :image, :info)";

        $this->db->query($sql);

        $this->db->bind(':name', $name);
        $this->db->bind(':image', $image);
        $this->db->bind(':info', $info);

        return $this->db->execute();
    }

    public function edit($id, $name, $image, $info)
    {
        if (!empty($image)) {
            $sql = "UPDATE categories SET  name=:name, img=:image, info=:info WHERE id=:id";
            $this->db->query($sql);
            $this->db->bind(':name', $name);
            $this->db->bind(':image', $image);
            $this->db->bind(':info', $info);
            $this->db->bind(':id', $id);

            return $this->db->execute();
        }

        $sql = "UPDATE categories SET  name=:name, info=:info WHERE id=:id";
        $this->db->query($sql);
        $this->db->bind(':name', $name);
        $this->db->bind(':info', $info);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM categories WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

}
?>