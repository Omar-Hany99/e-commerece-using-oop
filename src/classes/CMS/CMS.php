<?php

namespace App\CMS;

class CMS
{
    public $db = null;                   // Stores reference to Database object
    protected $product = null;
    protected $furniture = null;
    protected $dvd = null;
    protected $book = null;


    public function __construct($dsn, $username, $password)
    {
        $this->db = new Database($dsn, $username, $password); // Create Database object
    }

    public function getProduct()
    {
        if ($this->product === null) {                        // If $article property null
            $this->product = new Product($this->db);          // Create Article object
        }
        return $this->product;                                // Return Article object
    }

    public function getFurniture()
    {
        if ($this->furniture === null) {                        // If $article property null
            $this->furniture = new Furniture($this->db);          // Create Article object
        }
        return $this->furniture;                                // Return Article object
    }

    public function getDvd()
    {
        if ($this->dvd === null) {                        // If $article property null
            $this->dvd = new Dvd($this->db);          // Create Article object
        }
        return $this->dvd;                                // Return Article object
    }

    public function getBook()
    {
        if ($this->book === null) {                        // If $article property null
            $this->book = new Book($this->db);          // Create Article object
        }
        return $this->book;                                // Return Article object
    }
}
