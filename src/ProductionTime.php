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
            return self::getNextWorkingDate($team, self::addDaysToDate($date, 1));
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

        return !$holiday;
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
        if (self::isWorkingDate("production", $order_date)) {
            $production_happening_date  = self::addDaysToDate($order_date, 1);
            $production_completion_date = self::getNextWorkingDate("production", $production_happening_date);
        } else {
            $production_start_date      = self::getNextWorkingDate("production", $order_date);
            $production_happening_date  = self::addDaysToDate($production_start_date, 1);
            $production_completion_date = self::getNextWorkingDate("production", $production_happening_date);
        }

        return $production_completion_date;
    }

    public static function shippingCompletionDate(string $production_date): string
    {
        if (self::isWorkingDate("shipping", $production_date)) {
            $shipping_happening_date  = self::addDaysToDate($production_date, 1);
            $shipping_completion_date = self::getNextWorkingDate("shipping", $shipping_happening_date);
        } else {
            $shipping_start_date = self::getNextWorkingDate("shipping", $production_date);
            $shipping_happening_date  = self::addDaysToDate($shipping_start_date, 1);
            $shipping_completion_date = self::getNextWorkingDate("shipping", $shipping_happening_date);
        }

        return $shipping_completion_date;
    }
}