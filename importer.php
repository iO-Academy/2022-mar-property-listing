<?php

use PennyLaneProperties\Database\APIHandler;
use PennyLaneProperties\Database\DatabaseConnector;
use PennyLaneProperties\Database\DatabaseImporter;

require_once "vendor/autoload.php";

$db = DatabaseConnector::connectToDB();

$handler = new APIHandler();

$importer = new DatabaseImporter($db, $handler);
$importer->populateDatabase();