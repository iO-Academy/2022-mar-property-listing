<?php

require_once 'vendor/autoload.php';
use PennyLaneProperties\Property\{PropertyHydrator};
use PennyLaneProperties\Database\DatabaseConnector;
$agentRef = $_GET['agentRef'];

$db = DatabaseConnector::getDbConnection();
try {
    $property = PropertyHydrator::fetchPropertyDetailsFromDB($db, $agentRef);
} catch(TypeError $e) {
    header("Location: index.php");
    exit;
}


$propertyHtml = $property->displayPropertyPage();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penny Lane Properties</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>

<div class="container-fluid justify-content-center navbar">
    <a href="index.php"><img src="Assets/pennyLaneLogo2.svg"></a>
</div>
<main class="container">
    <div class="row py-4 ">
        <?=$propertyHtml?>
    </div>
</main>
</body>
</html>
