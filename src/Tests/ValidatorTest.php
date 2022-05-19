<?php

namespace PennyLaneProperties\Tests;

require_once '../Form/Validator.php';
use Exception;
use PennyLaneProperties\Form\Validator;
use PHPUnit\Framework\TestCase;


class ValidatorTest extends TestCase
{

    public function testValidateAndSanitiseEmail_CorrectEmail()
    {
        $email = "test@gmail.com";

        $expected = "test@gmail.com";
        $actual = Validator::validateAndSanitiseEmail($email);

        $this->assertEquals($expected, $actual);
    }

    public function testValidateAndSanitiseEmail_WhitespacedEmail()
    {
        $email = "   test@gmail.com";

        $expected = "test@gmail.com";
        $actual = Validator::validateAndSanitiseEmail($email);

        $this->assertEquals($expected, $actual);
    }

    public function testValidateAndSanitiseEmail_BadString()
    {
        $email = "banana";
        $this->expectException(Exception::class);

        Validator::validateAndSanitiseEmail($email);

    }

    public function testValidateAndSanitiseTextInput_CorrectText()
    {
        $text = "This is a valid input";

        $expected = "This is a valid input";
        $actual = Validator::validateAndSanitiseTextInput($text);

        $this->assertEquals($expected, $actual);
    }

    public function testValidateAndSanitiseEmail_WhitespacedText()
    {
        $text = "  This is a valid input"   ;

        $expected = "This is a valid input";
        $actual = Validator::validateAndSanitiseTextInput($text);

        $this->assertEquals($expected, $actual);
    }

    public function testValidateAndSanitiseEmail_ShortString()
    {
        $email = "b";
        $this->expectException(Exception::class);

        Validator::validateAndSanitiseEmail($email);

    }

    public function testValidateAndSanitiseEmail_LongString()
    {
        $email = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus";
        $this->expectException(Exception::class);

        Validator::validateAndSanitiseEmail($email);

    }

    public function testValidatePhoneNumber_CorrectNumber()
    {
        $phone = "07896544445";

        $expected = "07896544445";
        $actual = Validator::validatePhoneNumber($phone);

        $this->assertEquals($expected, $actual);
    }

    public function testValidatePhoneNumber_InvalidNumber()
    {

        $phone = "banana";
        $this->expectException(Exception::class);

        Validator::validatePhoneNumber($phone);

    }






}
