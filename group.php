<?php

namespace App;

require "./vendor/autoload.php";

$group_number = new GroupNumber();

$group_20 = $group_number->getGroupNumber(20);
$group_15 = $group_number->getGroupNumber(15);
$group_9  = $group_number->getGroupNumber(9);
$group_5  = $group_number->getGroupNumber(5);
$group_3  = $group_number->getGroupNumber(3);

echo "<pre>";
print_r('Group#20: '.implode(',', $group_20)."<br />");
print_r('Group#15: '.implode(',', $group_15)."<br />");
print_r('Group#9: '.implode(',', $group_9)."<br />");
print_r('Group#5: '.implode(',', $group_5)."<br />");
print_r('Group#3: '.implode(',', $group_3)."<br />");