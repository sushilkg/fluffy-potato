<?php

namespace App;

class Database
{
    const HOST     = '127.0.0.1';
    const USER     = 'root';
    const PASS     = 'root';
    const DATABASE = 'gogoprint';
    const CHARSET  = 'utf8mb4';

    protected static $connection = null;

    public function __construct()
    {
        if (!self::$connection) {
            self::connect();
        }
    }

    protected static function connect()
    {
        $dsn     = "mysql:host=".self::HOST.";dbname=".self::DATABASE.";charset=".self::CHARSET;
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            self::$connection = new \PDO($dsn, self::USER, self::PASS, $options);
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