<?php

namespace PennyLaneProperties\Tests;
require_once '../Property/Property.php';
use PennyLaneProperties\Property\Property;
use PHPUnit\Framework\TestCase;

class PropertyTest extends TestCase
{

    public function testGetFullAddress_Numerical()
    {
        $address_1 = "2";

        $sut = new Property();

        $sut->setAddress1($address_1);

        $expected = "2 Plough Hill Road, Nuneaton, CV11 6PE";
        $actual = $sut->getFullAddress();

        $this->assertEquals($expected, $actual);
    }

    public function testGetFullAddress_Alphabetical()
    {
        $address_1 = "Hillfield";
        $sut = new Property();
        $sut->setAddress1($address_1);

        $expected = "Hillfield, Plough Hill Road, Nuneaton, CV11 6PE";
        $actual = $sut->getFullAddress();

        $this->assertEquals($expected, $actual);
    }

    public function testDisplayCard()
    {
        $address_1 = "Hillfield";
        $image = "CSL123_100327_IMG_00.JPG";
        $sut = new Property();
        $sut->setAddress1($address_1);
        $sut->setImage($image);

        $expected = "<div class='col-sm-12 col-md-4 col-lg-3 '><div class='card card__status card__status--sale border border-dark position-relative'><span class='visually-hidden'>New alerts</span><img src='https://dev.io-academy.uk/resources/property-feed/images/CSL123_100327_IMG_00.JPG' class='card-img-top' alt='Photo of Hillfield, Plough Hill Road, Nuneaton, CV11 6PE'><div class='card-body'><p class='card-text'>Hillfield, Plough Hill Road, Nuneaton, CV11 6PE</p><a href='displayPage.php?agentRef=CSL123_100259' class='btn btn-primary btn-sm align-items-end'>PROPERTY DETAILS</a></div></div></div>";
        $actual = $sut->displayCard();

        $this->assertEquals($expected, $actual);
    }
    public function testDisplayCard_NoImage()
    {
        $address_1 = "Hillfield";
        $sut = new Property();
        $sut->setAddress1($address_1);

        $expected = "<div class='col-sm-12 col-md-4 col-lg-3 '><div class='card card__status card__status--sale border border-dark position-relative'><span class='visually-hidden'>New alerts</span><img src='Assets/housePlaceholder.png' class='card-img-top' alt='Photo of Hillfield, Plough Hill Road, Nuneaton, CV11 6PE'><div class='card-body'><p class='card-text'>Hillfield, Plough Hill Road, Nuneaton, CV11 6PE</p><a href='displayPage.php?agentRef=CSL123_100259' class='btn btn-primary btn-sm align-items-end'>PROPERTY DETAILS</a></div></div></div>";
        $actual = $sut->displayCard();

        $this->assertEquals($expected, $actual);
    }

    public function testGetFormatPrice()
    {
        $sut = new Property();

        $expected = "355,000";
        $actual = $sut->getFormatPrice();

        $this->assertEquals($expected,$actual);
    }

    public function testDisplayPropertyPage()
    {
        $address_1 = "Hill Farm";
        $image = "CSL123_100327_IMG_00.JPG";

        $sut = new Property();
        $sut->setAddress1($address_1);
        $sut->setImage($image);

        $expected = "<div class='row mt-5'><div class='card mb-3 rounded card__status card__status--sale'><img class='img-fluid' src='https://dev.io-academy.uk/resources/property-feed/images/CSL123_100327_IMG_00.JPG'<div class='card-body'><h5 class='card-title text-wrap'>Hill Farm, Plough Hill Road, Nuneaton, CV11 6PE</h5><p class='card-text text-wrap'>£355,000</p><p class='card-text text-wrap'>6 Bedrooms</p><p class='card-text text-wrap'>Lorem Ipsum</p>";
        $actual = $sut->displayPropertyPage();
        $this->assertEquals($expected,$actual);
    }

    public function testDisplayPropertyPage_NoImage()
    {
        $address_1 = "Hill Farm";

        $sut = new Property();
        $sut->setAddress1($address_1);

        $expected = "<div class='row mt-5'><div class='card mb-3 rounded card__status card__status--sale'><img class='img-fluid' src='Assets/housePlaceholder.png'<div class='card-body'><h5 class='card-title text-wrap'>Hill Farm, Plough Hill Road, Nuneaton, CV11 6PE</h5><p class='card-text text-wrap'>£355,000</p><p class='card-text text-wrap'>6 Bedrooms</p><p class='card-text text-wrap'>Lorem Ipsum</p>";
        $actual = $sut->displayPropertyPage();
        $this->assertEquals($expected,$actual);
    }

    public function testGetStatus_ForSale()
    {
        $sut = new Property();

        $expected = "card__status--sale";
        $actual = $sut->getStatusClass();

        $this->assertEquals($expected,$actual);
    }

    public function testGetStatus_Sold()
    {
        $sut = new Property();
        $sut->setStatus("Sold");

        $expected = "card__status--sold";
        $actual = $sut->getStatusClass();

        $this->assertEquals($expected,$actual);
    }

    public function testGetStatus_LetAgreed()
    {
        $sut = new Property();
        $sut->setStatus("Let Agreed");
        $expected = "card__status--letAgreed";
        $actual = $sut->getStatusClass();

        $this->assertEquals($expected,$actual);
    }

    public function testGetStatus_ToLet()
    {
        $sut = new Property();
        $sut->setStatus("To let");

        $expected = "card__status--toLet";
        $actual = $sut->getStatusClass();

        $this->assertEquals($expected,$actual);
    }

    public function testGetStatus_Malformed()
    {
        $sut = new Property();
        $sut->setStatus("Banana");

        $expected = NULL;
        $actual = $sut->getStatusClass();

        $this->assertEquals($expected,$actual);
    }

    public function testGetImageUrl_Null()
    {
        $sut = new Property();

        $expected = 'Assets/housePlaceholder.png';
        $actual = $sut->getImageUrl();

        $this->assertEquals($expected, $actual);
    }

    public function testGetImageUrl_ImageGiven()
    {
        $sut = new Property();
        $sut->setImage("CSL123_100327_IMG_00.JPG");

        $expected = 'https://dev.io-academy.uk/resources/property-feed/images/CSL123_100327_IMG_00.JPG';
        $actual = $sut->getImageUrl();

        $this->assertEquals($expected, $actual);
    }
}
