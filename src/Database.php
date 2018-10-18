<?php

namespace App;

class Database
{
    protected static $connection = null;

    public function __construct()
    {
        if (!self::$connection) {
            self::connect();
        }
    }

    protected static function connect()
    {
        $dsn     = "mysql:host=".getenv("HOST").";dbname=".getenv("DATABASE").";charset=".getenv("CHARSET");
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            self::$connection = new \PDO($dsn, getenv("USER"), getenv("PASS"), $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    public function query($sql, $method = \PDO::FETCH_ASSOC)
    {
        try {
            return self::$connection->query($sql, $method);
        } catch (\PDOException $exception) {
            throw $exception;
        }
    }
}