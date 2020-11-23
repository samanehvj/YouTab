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

    public function add($name, $image)
    {
        $sql = "INSERT INTO categories 
        (name, img) 
        values 
        (:name, :image)";

        $this->db->query($sql);

        $this->db->bind(':name', $name);
        $this->db->bind(':image', $image);

        return $this->db->execute();
    }

    public function edit($id, $name, $image)
    {
        if (!empty($image)) {
            $sql = "UPDATE categories SET  name=:name, img=:image WHERE id=:id";
            $this->db->query($sql);
            $this->db->bind(':name', $name);
            $this->db->bind(':image', $image);
            $this->db->bind(':id', $id);

            return $this->db->execute();
        }

        $sql = "UPDATE categories SET  name=:name WHERE id=:id";
        $this->db->query($sql);
        $this->db->bind(':name', $name);
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