<?php

namespace App\CMS;

class Furniture extends Product
{
    public $length;
    public $width;
    public $height;

    public function __construct($db = null)
    {
        parent::__construct($db);
    }

    public function getLength()
    {
        return $this->length;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getFurnitureProducts()
    {
        $sql = "SELECT p.product_id, p.sku, p.name, p.price, p.type, f.height, f.width, f.length 
                FROM products p INNER JOIN furniture f ON p.product_id = f.id 
                WHERE p.type = 'furniture'";
        $stat = $this->db->runSQL($sql);
        $stat->setFetchMode(\PDO::FETCH_CLASS, 'App\CMS\Furniture');
        $products = $stat->fetchAll();
        return $products;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function save()
    {
        try {
            $this->db->beginTransaction();
            parent::save();

            $sql = "INSERT INTO furniture (id, length, width, height) VALUES (:id, :length, :width, :height);";
            $this->db->runSQL($sql, [$this->product_id, $this->length, $this->width, $this->height]);


            $this->db->commit();

        } catch (PDOException $e) {
            $this->db->rollback();
            throw $e;
        }
    }

    public function print(): string
    {
        $html = parent::print();
        $height = $this->getHeight();
        $length = $this->getLength();
        $width = $this->getWidth();
        return <<<HTML
            $html
            <div class="product-data">
                <p><span>Dimention: </span>$height x $width x $length</p>
            </div>
            HTML;
    }

    public function delete($product_id)
    {
        $sql = "DELETE FROM furniture 
               WHERE id = :id;";                         // SQL statement
        $this->db->runSql($sql, [$product_id]);            // Delete image from image
    }
}
