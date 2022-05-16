<?php

use PennyLaneProperties\Database\{APIHandler, DatabaseConnector, DatabaseImporter};

require_once "vendor/autoload.php";

(new DatabaseImporter(DatabaseConnector::connectToDB(), new APIHandler))->populateDatabase();
