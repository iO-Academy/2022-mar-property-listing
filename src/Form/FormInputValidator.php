<?php

namespace PennyLaneProperties\Form;

use mysql_xdevapi\Exception;
use function PHPUnit\Framework\throwException;

class FormInputValidator
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
    public function __construct(string $customer_name, string $email, string $phone_number, string $message, string $agent_ref)
    {
        $this->customer_name = $this->inputValidation($customer_name);
        $this->email = $this->emailValidation($email);
        $this->phone_number = $this->phoneValidation($phone_number);
        $this->message = $this->inputValidation($message);
        $this->agent_ref = $this->inputValidation($agent_ref);
    }

    /**
     * @return string
     */
    public function getCustomerName(): string
    {
        return $this->customer_name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return false|int|string
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getAgentRef(): string
    {
        return $this->agent_ref;
    }


    protected function inputValidation(string $inputData): string
    {
        $trimmedInput = trim($inputData);
        if ((strlen($trimmedInput)>=3) && (strlen($trimmedInput)<500)) {
            return htmlspecialchars($trimmedInput);
        }
      throw new Exception();
    }

    protected function emailValidation(string $email): string
    {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    protected function phoneValidation(string $phone_number)
    {
       if(preg_match('/([+]|[0])[ 0-9]{7,14}/', $phone_number) || (strlen($phone_number) === 0)){
           return $phone_number;
       }
        throw new Exception('Please enter a valid phone number');
    }
}