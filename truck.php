<?php
namespace App;
require "./vendor/autoload.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSS Truck</title>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="assets/truck.js"></script>
    <link rel="stylesheet" href="assets/truck.css">
</head>
<body>
<?php
$truck_a = (new TruckCopy())->getTruckHtml('#CCE70B', 'Hello, Ecommerce.');
$truck_b = (new TruckCopy())->getTruckHtml('#E5560E', 'Hi, Magento.');

echo $truck_a;
echo '<br />';
echo $truck_b;
?>
</body>
</html>