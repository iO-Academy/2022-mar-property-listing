<?php

namespace PennyLaneProperties\Form;

use PDO;


class FormSubmission
{
    protected string $customer_name;
    protected string $email;
    protected string $phone_number = '';
    protected string $message;
    protected string $agent_ref;

    /**
     * @param string $customer_name
     * @param string $email
     * @param string $phone_number
     * @param string $message
     * @param string $agent_ref
     */
    public function __construct(string $customer_name, string $email, string $phone_number, string $message, string $agent_ref, PDO $db)
    {
        $this->customer_name = Validator::validateAndSanitiseTextInput($customer_name);
        $this->email = Validator::validateAndSanitiseEmail($email);
        $this->phone_number = Validator::validatePhoneNumber($phone_number);
        $this->message = Validator::validateAndSanitiseTextInput($message);
        $this->agent_ref = Validator::validateAndSanitiseTextInput($agent_ref);

        $this->sendToDb($db);
    }

    protected function sendToDb(PDO $db): void
    {
        $query = $db->prepare(" INSERT into `customer_queries` 
                             (`customer_name`, `email`, `phone_number`, `message`, `date_time_submitted`, `agent_ref`) 
                             VALUES ( :customer_name, :email, :phone_number, :message, now(), :agent_ref)");

        $query->bindParam(':customer_name', $this->customer_name);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':phone_number', $this->phone_number);
        $query->bindParam(':message', $this->message);
        $query->bindParam(':agent_ref', $this->agent_ref);

        $query->execute();
    }


}