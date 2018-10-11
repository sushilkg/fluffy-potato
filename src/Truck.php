<?php

namespace App;

class Truck
{
    protected $truckText;

    protected function setText($text)
    {
        $this->truckText = $text;
    }
}