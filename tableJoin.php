<?php

namespace App;

require "./vendor/autoload.php";

$tableJoin = new TableJoin(new Database());

echo "<pre>";
print_r($tableJoin->getSummary());