<?php

namespace App;

class Database
{
    public static $connection = false;

    public function __construct()
    {
        if (!self::$connection) {
            self::connection();
        }
    }

    private static function connection()
    {
        $host    = '127.0.0.1';
        $db      = 'gogoprint';
        $user    = 'root';
        $pass    = 'root';
        $charset = 'utf8mb4';

        $dsn     = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            self::$connection = new \PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    public function getConnection()
    {
        return self::$connection;
    }

    public function query($sql) {
        try {
            return self::$connection->query($sql);
        } catch (\PDOException $exception) {
            throw $exception;
        }
    }
}