<?php
namespace App\Cms;

class Product
{
    public $db;
    public $sku;
    public $name;
    public $price;
    public $product_type;

    public function __construct(Database $db)
    {
        $this->db = $db;                                 // Store ref to Database object
    }
    public function create($product)
    {
        try {                                            // Try to create category
            $sql = 'INSERT INTO products (sku, name, price, product_type)
                    VALUES (:sku, :name, :price, :type);';
            $this->db->runSQL($sql, $product);          // Add new category
            return true;                                 // It worked, return true
        } catch (\PDOException $e) {                     // If a exception was thrown
            if ($e->errorInfo[1] === 1062) {             // If error indicates duplicate entry
                return false;                            // Return false to indicate duplicate name
            } else {                                     // Otherwise
                throw $e;                                // Re-throw exception
            }
        }
    }
    public function getLastInsertId()
    {
        return $this->db->lastInsertId();
    }

}