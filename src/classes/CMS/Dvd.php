<?php

namespace App\CMS;

class Dvd extends Product
{
    public $size;

    public function __construct($db = null)
    {
        parent::__construct($db);
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getDvdProducts()
    {
        $sql = "SELECT p.product_id, p.sku, p.name, p.price, p.type, d.size
                FROM products p INNER JOIN dvd d ON p.product_id = d.id
                WHERE p.type = 'dvd';";
        $stat = $this->db->runSQL($sql);
        $stat->setFetchMode(\PDO::FETCH_CLASS, 'App\CMS\Dvd');
        $products = $stat->fetchAll();
        return $products;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function save()
    {
        try {
            $this->db->beginTransaction();

            parent::save();
            $sql = "INSERT INTO dvd (id, size) VALUES (:id, :size);";
            $this->db->runSQL($sql, [$this->product_id, $this->size]);

            $this->db->commit();

        } catch (\PDOException $e) {
            $this->db->rollback();
            if ($e->errorInfo[1] === 1062) {             // If error indicates duplicate entry
                return false;                            // Return false to indicate duplicate name
            } else {                                     // Otherwise
                throw $e;                                // Re-throw exception
            }
        }
    }

    public function print(): string
    {
        $html = parent::print();
        $size = $this->getSize();
        return <<<HTML
            $html
            <div class="product-data">
                <p><span>Size:  </span>$size</p>
            </div>
            HTML;
    }

    public function delete($product_id)
    {
        $sql = "DELETE FROM dvd 
               WHERE id = :id;";                         // SQL statement
        $this->db->runSql($sql, [$product_id]);            // Delete image from image
    }

}

