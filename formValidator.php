<?php

require_once 'vendor/autoload.php';

if (!isset($_POST['agent_ref'])) {
    header("Location:index.php");
    exit;
}
if (!isset($_POST['customer_name']) || !isset($_POST['email']) || !isset($_POST['message'])) {
    header("Location:displayPage.php?agentRef={$_POST['agent_ref']}");
    exit;
}
$input = new \PennyLaneProperties\Form\FormInputValidator(
    $_POST['customer_name'],
    $_POST['email'],
    $_POST['phone_number'],
    $_POST['message'],
    $_POST['agent_ref']
);



