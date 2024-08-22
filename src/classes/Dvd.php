<?php

class Dvd extends Product
{
    public $db;
    public $size;
    public function __construct(Database $db)
    {
        parent::__construct($db);
    }
    public function createe($arg)
    {
        unset($arg['widht'], $arg['length'], $arg['height'], $arg['weight']);
        $sql = "INSERT INTO dvd_attributes (id , size)
        VALUES (:id , :size);";

        return $this->db->runSql($sql , $arg);
    }
}