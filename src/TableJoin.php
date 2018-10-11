<?php

namespace App;

class TableJoin
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getSummary()
    {
        $sql = 'SELECT customer.customer_id, customer.name,
                SUM(CASE WHEN sale_order_item.total_amount IS NOT NULL THEN sale_order_item.total_amount ELSE 0 END) AS sum_total_amount
                FROM customer
                LEFT JOIN sale_order
                ON sale_order.customer_id = customer.customer_id
                LEFT JOIN sale_order_item
                ON sale_order_item.order_id = sale_order.order_id
                GROUP BY customer.name
                ORDER BY sum_total_amount DESC;';

        return $this->database->query($sql)->fetchAll();
    }
}