<?php

namespace PennyLaneProperties\Form;

class CustomerQuerySender
{
    public static function sendCustomerQueryToDatabase(FormInputValidator $formInputValidator, PDO $db): void
    {
        $query = $db->prepare(" INSERT into `customer_queries` 
                             (`customer_name`, `email`, `phone_number`, `message`, `date_time_submitted`, `agent_ref`) 
                             VALUES ( :customer_name, :email, :phone_number, :message, now(), :agent_ref)");

        $query->bindParam(':customer_name', $formInputValidator->getCustomerName());
        $query->bindParam(':email', $formInputValidator->getEmail());
        $query->bindParam(':phone_number', $formInputValidator->getPhoneNumber());
        $query->bindParam(':message', $formInputValidator->getMessage());
        $query->bindParam(':agent_ref', $formInputValidator->getAgentRef());

        $query->execute();
    }
}




