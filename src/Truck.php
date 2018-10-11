<?php

namespace App;

class Truck
{
    protected $truckText;

    protected function setText($text)
    {
        $this->truckText = $text;
    }

    public function getText()
    {
        return $this->truckText;
    }
}