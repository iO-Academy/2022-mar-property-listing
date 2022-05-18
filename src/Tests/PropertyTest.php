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

        $expected = "<div class='col-sm-12 col-md-4 col-lg-3 '><div class='card card__status card__status--sale border border-dark position-relative'><span class='visually-hidden'>New alerts</span><img src='https://dev.io-academy.uk/resources/property-feed/images/CSL123_100327_IMG_00.JPG' class='card-img-top' alt='Photo of Hillfield, Plough Hill Road, Nuneaton, CV11 6PE'><div class='card-body'><p class='card-text'>Hillfield, Plough Hill Road, Nuneaton, CV11 6PE</p><a href='#' class='btn btn-primary btn-sm align-items-end'>PROPERTY DETAILS</a></div></div></div>";
        $actual = $sut->displayCard();

        $this->assertEquals($expected, $actual);
    }
    public function testDisplayCard_NoImage()
    {
        $address_1 = "Hillfield";
        $sut = new Property();
        $sut->setAddress1($address_1);

        $expected = "<div class='col-sm-12 col-md-4 col-lg-3 '><div class='card card__status card__status--sale border border-dark position-relative'><span class='visually-hidden'>New alerts</span><img src='Assets/housePlaceholder.png' class='card-img-top' alt='Photo of Hillfield, Plough Hill Road, Nuneaton, CV11 6PE'><div class='card-body'><p class='card-text'>Hillfield, Plough Hill Road, Nuneaton, CV11 6PE</p><a href='#' class='btn btn-primary btn-sm align-items-end'>PROPERTY DETAILS</a></div></div></div>";
        $actual = $sut->displayCard();

        $this->assertEquals($expected, $actual);
    }

}
