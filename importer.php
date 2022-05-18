<?php

use PennyLaneProperties\Database\{ApiData, DatabaseConnector, DatabaseImporter};

require_once "vendor/autoload.php";

$db = DatabaseConnector::getDbConnectionFromTerminal();

$data = new ApiData();

$importer = new DatabaseImporter($db, $data);
$importer->populateDatabase();
