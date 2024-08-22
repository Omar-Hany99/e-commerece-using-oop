<?php

class Furniture extends Product
{
    public $db;
    public $length;
    public $width;
    public $height;

 public function __construct(Database $db)
 {
     $this->db = $db;
 }
    public function getProduct()
    {
        $sql = "SELECT 
    p.product_id,  p.sku, p.name, 
    p.price, f.height, f.width, 
    f.length
FROM 
    products p
JOIN 
    furniture_attributes f ON p.product_id = f.id
WHERE 
    p.product_id = 1;";

        return $this->db->runSql($sql)->fetch();  // Return article
    }
    public function createe($arg)
    {
        $sql = "INSERT INTO furniture_attributes (id , height , width , length)
        VALUES (:id , :height , :width , :length);";
        unset($arg['size'] , $arg['weight']);
        return $this->db->runSql($sql , $arg);
    }


}