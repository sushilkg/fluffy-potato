<?php

namespace App;

require "./vendor/autoload.php";

$tableJoin = new TableJoin(new Database());
print_r($tableJoin->getSummary());