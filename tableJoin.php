<?php

namespace App;

use Dotenv\Dotenv;

require "./vendor/autoload.php";

$dotenv = new Dotenv(__DIR__);
$dotenv->load();

$tableJoin = new TableJoin(new Database());

echo "<pre>";
print_r($tableJoin->getSummary());