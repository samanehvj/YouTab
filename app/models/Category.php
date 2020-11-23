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

}
?>