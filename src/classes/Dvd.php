<?php
namespace App\Cms;

class Dvd extends Product
{
    public $db;
    public $size;
    public function __construct(Database $db)
    {
        parent::__construct($db);
    }
    public function createe($dvd)
    {
        $sql = "INSERT INTO dvd_attributes (id , size)
        VALUES (:id , :size);";
        return $this->db->runSql($sql , $dvd);
    }
}