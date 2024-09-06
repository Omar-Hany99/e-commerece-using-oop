<?php

namespace App\CMS;

class Book extends Product
{
    public $weight;

    public function __construct($db = null)
    {
        parent::__construct($db);
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function save()
    {
        try {
            $this->db->beginTransaction();
            parent::save();

            $sql = "INSERT INTO book (id, weight) VALUES (:id, :weight);";
            $this->db->runSQL($sql, [$this->product_id, $this->weight]);

            $this->db->commit();

        } catch (PDOException $e) {
            $this->db->rollback();
            throw $e;
        }
    }

    public function getBookProducts()
    {
        $sql = "SELECT p.product_id, p.sku, p.name, p.price, p.type, b.weight
                FROM products p
                INNER JOIN book b ON p.product_id = b.id
                WHERE p.type = 'book';";
        $stat = $this->db->runSQL($sql);
        $stat->setFetchMode(\PDO::FETCH_CLASS, 'App\CMS\Book');
        $products = $stat->fetchAll();
        return $products;
    }

    public function print(): string
    {
        $html = parent::print();
        $weight = $this->getWeight();
        return <<<HTML
            $html
            <div class="product-data">
                <p><span>Weight:  </span>$weight</p>
            </div>
            HTML;
    }

    public function delete($product_id)
    {
        $sql = "DELETE FROM book 
               WHERE id = :id;";                         // SQL statement
        $this->db->runSql($sql, [$product_id]);            // Delete image from image
    }
}