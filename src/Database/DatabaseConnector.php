<?php

namespace PennyLaneProperties\Database;

use PDO;

class DatabaseConnector
{
    static public function getDbConnection(): PDO
    {
        $db = new PDO("mysql:host=db; dbname=property-listings", 'root', 'password');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }


    static public function getDbConnectionFromTerminal(): PDO
    {
        $db = new PDO("mysql:host=127.0.0.1:3306; dbname=property-listings", 'root', 'password');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}