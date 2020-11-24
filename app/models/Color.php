<?php

Class Color {

    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public function getAll()
    {
        $sql = "SELECt * FROM colors";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $sql = "SELECt * FROM colors WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    public function add($name, $hex)
    {
        $sql = "INSERT INTO colors 
        (name, hex) 
        values 
        (:name, :hex)";

        $this->db->query($sql);

        $this->db->bind(':name', $name);
        $this->db->bind(':hex', $hex);

        return $this->db->execute();
    }

    public function edit($id, $name, $hex)
    {
        $sql = "UPDATE colors SET  name=:name, hex=:hex WHERE id=:id";
        $this->db->query($sql);
        $this->db->bind(':name', $name);
        $this->db->bind(':hex', $hex);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM colors WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

}
?>