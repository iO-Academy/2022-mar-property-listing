<?php

namespace PennyLaneProperties\Form;

use Exception;

class Validator
{
    public static function validateAndSanitiseTextInput(string $inputData): string
    {
        $trimmedInput = trim($inputData);
        if ((strlen($trimmedInput)>=3) && (strlen($trimmedInput)<=500)) {
            return htmlspecialchars($trimmedInput);
        }
        throw new Exception("Please ensure your name or message are between 3 and 500 characters");
    }

    public static function validateAndSanitiseEmail(string $email): string
    {
        $trimmedEmail = trim($email);
        if(!filter_var($trimmedEmail, FILTER_VALIDATE_EMAIL)){
            throw new Exception("Please enter a valid email address");
        }
        return $trimmedEmail;
    }

    public static function validatePhoneNumber(string $phone_number): string
    {
        if(preg_match('/([+]|[0])[ 0-9]{7,14}/', $phone_number) || (strlen($phone_number) === 0)){
            return $phone_number;
        }
        throw new Exception('Please enter a valid phone number');
    }
}