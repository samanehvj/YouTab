<?php


class OrderDetail
{
    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public function add($orderId, $pcsId, $price, $qty = 1)
    {
        $sql = "INSERT INTO order_details 
                (order_id, product_color_size_id, price, qty) 
                values 
                (:orderId, :pcsId, :price, :qty)";

        $this->db->query($sql);

        $this->db->bind(':orderId', $orderId);
        $this->db->bind(':pcsId', $pcsId);
        $this->db->bind(':price', $price);
        $this->db->bind(':qty', $qty);


        return $this->db->execute();
    }

}