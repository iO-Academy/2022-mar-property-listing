<?php

namespace PennyLaneProperties\Database;

use PDO;

class DatabaseConnector
{
     static public function connect(): PDO
     {
        $db = new PDO("mysql:host=db; dbname=property-listings", 'root', 'password');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}