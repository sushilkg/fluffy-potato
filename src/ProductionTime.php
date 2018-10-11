<?php

namespace App;

class ProductionTime
{
    protected static $holidays = [
        "2018-01-01",
        "2018-01-02",
        "2018-03-01",
        "2018-04-06",
        "2018-04-13",
        "2018-04-14",
        "2018-04-15",
        "2018-04-16",
        "2018-05-01"
    ];

    public static function Delivery($order_date)
    {
        $production_date = "";
        $shipping_date   = "";
        $delivery_date   = "";

        return $delivery_date;
    }

    protected static function isWorkingDate($team, $date)
    {
    }

    protected static function isHoliday($date)
    {
        return in_array($date, self::$holidays);
    }

    protected static function isSaturday($date)
    {
        return (date('N', strtotime($date)) == 6);
    }

    protected static function isSunday($date)
    {
        return (date('N', strtotime($date)) == 7);
    }
}