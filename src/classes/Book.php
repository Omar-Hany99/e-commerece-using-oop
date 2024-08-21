<?php

class Book extends Product
{
    public $db;
    public $weight;

    public function __construct(Database $db)
    {
        parent::__construct($db);
    }