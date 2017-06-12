<?php
namespace Bazaar\Classes;

abstract class Db
{
    private static $conn = null;

    public static function getInstance()
    {
        if (isset(self::$conn)) {
            // if there is already a connection, return it
            return self::$conn;
        } else {
            // if there isn't a connection, add it
            self::$conn = new \PDO("mysql:host=localhost; dbname=bazaar", "root", "root");
            return self::$conn;
        }
    }
}