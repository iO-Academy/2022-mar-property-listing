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
    <img src="Assets/pennyLaneLogo2.svg">
</div>
<main class="container">
    <div class="row py-4 ">
        <?=$propertyHtml?>
    </div>

    <div class = "container col-sm-12 col-md-3 form_container">
        <h2 class ="text-center text-uppercase"> Enquiry Form</h2>
        <form action="formValidator.php" class="enquiry_form" method="post">
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input name="customer_name" type="text" class="form-control" id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Email address</label>
                <input name="email" type="email" class="form-control px-5" id="exampleFormControlInput2" placeholder="name@example.com" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3">Phone number</label>
                <input name="phone_number" type="text" class="form-control" id="exampleFormControlInput3" >
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">Your message here: </label>
                <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="Your message here..." maxlength="500" minlength="10" required></textarea>
            </div>
            <input type="submit" class="submit_button" name="agent_ref" {value="$_GET['agentRef']"}>
        </form>
    </div>
</main>
</body>
</html>
