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
        $sql = 'SELECT customer.customer_id, customer.name, sale_order.order_id, grand_total.sum_total_amount
FROM customer
LEFT JOIN sale_order
ON sale_order.customer_id = customer.customer_id
LEFT JOIN (SELECT order_id, SUM(total_amount) as sum_total_amount FROM sale_order_item GROUP BY order_id) AS grand_total
ON grand_total.order_id = sale_order.order_id
GROUP BY customer.name
ORDER BY grand_total.sum_total_amount DESC;';

        return $this->database->query($sql)->fetchAll();
    }
}