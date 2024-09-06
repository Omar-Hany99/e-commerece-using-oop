<?php

namespace App\CMS;
class Product
{
    public $db;
    public $product_id;
    public $sku;
    public $name;
    public $price;
    public $type;


    public function __construct($db = null)
    {
        $this->db = $db;
    }

    public function getProductId()
    {
        return $this->product_id;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getProducts()
    {
        $books = $cms->getBook()->getBookProducts();
        $dvds = $cms->getDvd()->getDvdProducts();
        $furniture = $cms->getFurniture()->getFurnitureProducts();
        $products = array_merge($books, $dvds, $furniture);

    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function save()
    {
            $sql = "INSERT INTO products (sku, name, Price, type) 
                VALUES (:sku, :name, :price, :type);";
            $params = [
                'sku' => $this->sku,
                'name' => $this->name,
                'price' => $this->price,
                'type' => $this->type
            ];
            $this->db->runSQL($sql, $params);
            $this->product_id = $this->db->lastInsertId();
        }
    public function print(): string
    {
        $sku = $this->getSku();
        $name = $this->getName();
        $price = $this->getPrice();
        return <<<HTML
            <div class="product-data">
                <p>$sku</p>
                <p>$name</p>
                <p>$price $</p>
            </div>
            HTML;
    }

    public function deleteProduct($product_id)
    {
        $sql = "DELETE FROM products 
               WHERE product_id  = :id;";                         // SQL statement
        $this->db->runSql($sql, [$product_id]);            // Delete image from image
    }
}
