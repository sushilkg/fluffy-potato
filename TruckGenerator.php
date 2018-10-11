<?php
class Truck
{
    protected function setText($text)
    {
        // set text here
    }
}

class TruckCopy extends Truck
{
    private function setBodyColor($color)
    {
        // set color here
    }

    public function getTruckHtml($color, $text)
    {
        // create the truck with html here
    }
}

$truck_a = (new TruckCopy())->getTruckHtml('#CCE70B', 'Hello, Ecommerce.');
$truck_b = (new TruckCopy())->getTruckHtml('#E5560E', 'Hi, Magento.');


echo $truck_a;
echo '<br />';
echo $truck_b;

?>
<style type=”text/css”>

    /** place your css here **/

</style>
