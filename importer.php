<?php

use PennyLaneProperties\Database\{APIHandler, DatabaseConnector, DatabaseImporter};

require_once "vendor/autoload.php";

$db = DatabaseConnector::connect();

$handler = new APIHandler();

$importer = new DatabaseImporter($db, $handler);
$importer->populateDatabase();