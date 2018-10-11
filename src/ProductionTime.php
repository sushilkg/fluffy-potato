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

    public static function Delivery(string $order_date): string
    {
        $production_date = $order_date + self::getNextWorkingDate("production", $order_date + "one date");
        $delivery_date   = $production_date + self::getNextWorkingDate("shipping", $order_date + "one date");;

        return $delivery_date;
    }

    protected static function getNextWorkingDate(string $team, string $date): string
    {
        if (self::isWorkingDate($team, $date)) {
            return $date;
        } else {
            return self::getNextWorkingDate($team, $date + "one day");
        }
    }

    protected static function isWorkingDate(string $team, string $date): bool
    {
        switch ($team) {
            case "production":
                $holiday = self::isHoliday($date) || self::isSaturday($date) || self::isSunday($date);
                break;
            case "shipping":
                $holiday = self::isHoliday($date) || self::isSaturday($date);
                break;
            default:
                $holiday = false;
                break;
        }

        return $holiday;
    }

    protected static function isHoliday(string $date): bool
    {
        return in_array($date, self::$holidays);
    }

    protected static function isSaturday(string $date): bool
    {
        return (date('N', strtotime($date)) == 6);
    }

    protected static function isSunday(string $date): bool
    {
        return (date('N', strtotime($date)) == 7);
    }
}