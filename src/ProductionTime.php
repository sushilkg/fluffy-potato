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
        $production_completion_date = self::productionCompletionDate($order_date);
        $shipping_completion_date   = self::shippingCompletionDate($production_completion_date);

        return $shipping_completion_date;
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

    protected static function addDaysToDate(string $date, string $daysToAdd): string
    {
        return date('Y-m-d', strtotime("$date + $daysToAdd days"));
    }

    public static function productionCompletionDate(string $order_date): string
    {
        $production_happening_date  = self::getNextWorkingDate("production", $order_date);
        $production_completion_date = self::addDaysToDate($production_happening_date, 1);

        return $production_completion_date;
    }

    public static function shippingCompletionDate(string $production_completion_date): string
    {
        $shipping_happening_date  = self::getNextWorkingDate("shipping", $production_completion_date);
        $shipping_completion_date = self::addDaysToDate($shipping_happening_date, 1);

        return $shipping_completion_date;
    }
}