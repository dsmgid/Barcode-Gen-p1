<?php
namespace dsmgfw;
use Opis\Database\Database;
use Opis\Database\Connection;
class db 
{
    /**
     * Initialize Database Connection for Opis Database
     * 
     * @return class
     */
    public static function init()
    {
        $connection = new Connection("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASS']);
        return new Database($connection);
    }
    /**
     * Initialize PDO Database Connection
     * 
     * @return class
     */
    public static function pdo()
    {
        return new \PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASS']);
    }
}
