<?php


namespace PennyLaneProperties\Form;
use PDO;


class CustomerQuerySender
{

    public static function sendCustomerQueryToDatabase(FormInputValidator $formInputValidator, PDO $db): void
    {
        $query = $db->prepare(" INSERT into `customer_queries` 
                             (`customer_name`, `email`, `phone_number`, `message`, `date_time_submitted`, `agent_ref`) 
                             VALUES ( :customer_name, :email, :phone_number, :message, now(), :agent_ref)");

        $validatedCustomerName = $formInputValidator->getCustomerName();
        $validatedEmail = $formInputValidator->getEmail();
        $validatedPhoneNumber = $formInputValidator->getPhoneNumber();
        $validatedMessage = $formInputValidator->getMessage();
        $validatedAgentRef = $formInputValidator->getAgentRef();

        $query->bindParam(':customer_name', $validatedCustomerName );
        $query->bindParam(':email', $validatedEmail);
        $query->bindParam(':phone_number', $validatedPhoneNumber);
        $query->bindParam(':message', $validatedMessage);
        $query->bindParam(':agent_ref', $validatedAgentRef );

        $query->execute();
    }
}




