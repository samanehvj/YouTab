<?php

Class Size {

    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }
//create get all function for size

    public function getAll()
    {
        $sql = "SELECt * FROM sizes";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $sql = "SELECt * FROM sizes WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    public function add($name)
    {
        $sql = "INSERT INTO sizes 
        (name) 
        values 
        (:name)";

        $this->db->query($sql);

        $this->db->bind(':name', $name);

        return $this->db->execute();
    }
//create edit function for size
    public function edit($id, $name)
    {
        $sql = "UPDATE sizes SET  name=:name WHERE id=:id";
        $this->db->query($sql);
        $this->db->bind(':name', $name);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }
//create delete function for size

    public function delete($id)
    {
        $sql = "DELETE FROM sizes WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

}
?>