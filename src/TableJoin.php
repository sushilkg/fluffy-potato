<?php

namespace App;

class TableJoin
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getSummary()
    {
        $summary = $this->database->query("SELECT * FROM customer");
    }
}