<?php

require_once 'vendor/autoload.php';

use PennyLaneProperties\Database\DatabaseConnector;
use PennyLaneProperties\DisplayPage\DisplayPageHydrator;

$displayHydrator = new DisplayPageHydrator();

$db = DatabaseConnector::connect();
$propertyData = $displayHydrator->getProperty($db, 'CSL123_100259');
echo '<pre>';
var_dump($propertyData);
echo '</re>';

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
        <img src="Assets/pennyLaneLogo2.svg">
    </div>
    <div class="container">

        <div class="row">
            <div class="card mb-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo "{$propertyData["address_1"]}, {$propertyData["address_2"]}" ?></h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

    </div>
</body>
</html>


