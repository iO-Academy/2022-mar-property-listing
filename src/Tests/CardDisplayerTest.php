<?php

namespace PennyLaneProperties\Tests ;
require_once '../Card/CardEntity.php';
require_once '../Card/CardDisplayer.php';
use PennyLaneProperties\Card\CardEntity;
use PennyLaneProperties\Card\CardDisplayer;
use \PHPUnit\Framework\TestCase;


class CardDisplayerTest extends TestCase
{
    public function testCardDisplayerDisplayCardSuccess(){
    //test Data
        $cardEntityMock = $this->createMock(CardEntity::class);
        $cardEntityMock->method('getStatus')-> willReturn('For Sale');
        $cardEntityMock->method('getImageUrl')->willReturn('https://dev.io-academy.uk/resources/property-feed/images/CSL123_100291_IMG_00.JPG');
        $cardEntityMock->method('getAddress')->willReturn('171 Lutterworth Road, Nuneaton, CV11 6PY');

        $cardEntityMockTwo = $this->createMock(CardEntity::class);
        $cardEntityMockTwo->method('getStatus')->willReturn('Sold');
        $cardEntityMockTwo->method('getImageUrl')->willReturn('https://dev.io-academy.uk/resources/property-feed/images/CSL123_100297_IMG_00.JPG');
        $cardEntityMockTwo->method('getAddress')->willReturn('30 Tulliver Road, Nuneaton, CV10 7AL');



        $expected = "<div class='col-sm-12 col-md-4 col-lg-3 '>"
        ."<div class='card card__status card__status--sale border border-dark position-relative'>"
        ."<span class='visually-hidden'>New alerts</span>"
        ."<img src='https://dev.io-academy.uk/resources/property-feed/images/CSL123_100291_IMG_00.JPG' class='card-img-top' alt='Photo of 171 Lutterworth Road, Nuneaton, CV11 6PY'>"
        ."<div class='card-body'>"
        ."<p class='card-text'>171 Lutterworth Road, Nuneaton, CV11 6PY</p>"
        ."<a href='#' class='btn btn-primary btn-sm align-items-end'>PROPERTY DETAILS</a>"
        ."</div></div></div><div class='col-sm-12 col-md-4 col-lg-3 '>"
        ."<div class='card card__status card__status--sold border border-dark position-relative'>"
        ."<span class='visually-hidden'>New alerts</span>"
        ."<img src='https://dev.io-academy.uk/resources/property-feed/images/CSL123_100297_IMG_00.JPG' class='card-img-top' alt='Photo of 30 Tulliver Road, Nuneaton, CV10 7AL'>"
        ."<div class='card-body'>"
        ."<p class='card-text'>30 Tulliver Road, Nuneaton, CV10 7AL</p>"
        ."<a href='#' class='btn btn-primary btn-sm align-items-end'>PROPERTY DETAILS</a>"
        ."</div></div></div>";

        $cardEntitiesMock = [$cardEntityMock, $cardEntityMockTwo];
        $actual=CardDisplayer::displayCards($cardEntitiesMock);
        $this->assertEquals($expected, $actual);

    }

    Public function testCardDisplayerDisplayCardFailure(){

        $failureTestData = ['house 1', 'house 2', 'house3'];
        $expected = '';
        $actual = CardDisplayer::displayCards($failureTestData);
        $this->assertEquals($expected, $actual);

    }


}