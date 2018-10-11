<?php
require "./vendor/autoload.php";

$truck_a = (new TruckCopy())->getTruckHtml('#CCE70B', 'Hello, Ecommerce.');
$truck_b = (new TruckCopy())->getTruckHtml('#E5560E', 'Hi, Magento.');


echo $truck_a;
echo '<br />';
echo $truck_b;