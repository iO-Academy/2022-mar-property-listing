<?php

require_once 'vendor/autoload.php';

use PennyLaneProperties\Database\DatabaseConnector;
use PennyLaneProperties\Form\CustomerQuerySender;

$db = DatabaseConnector::getDbConnection();

if (!isset($_POST['agent_ref'])) {
    header("Location:index.php");
    exit;
}
if (!isset($_POST['customer_name']) || !isset($_POST['email']) || !isset($_POST['message'])) {
    header("Location:displayPage.php?agentRef={$_POST['agent_ref']}");
    exit;
}
try {
$input = new \PennyLaneProperties\Form\FormInputValidator(
    $_POST['customer_name'],
    $_POST['email'],
    $_POST['phone_number'],
    $_POST['message'],
    $_POST['agent_ref']
);
} catch (Exception $e){
    
}
\PennyLaneProperties\Form\CustomerQuerySender::sendCustomerQueryToDatabase($input, $db);

header("Location:displayPage.php?agentRef={$_POST['agent_ref']}");

