<?php

namespace App;

require "./vendor/autoload.php";

echo "<pre>";
echo ProductionTime::Delivery('2018-04-11');
echo "<br />";
echo ProductionTime::Delivery('2018-04-13');
echo "<br />";
echo ProductionTime::Delivery('2018-04-19');