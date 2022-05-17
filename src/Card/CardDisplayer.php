<?php

namespace PennyLaneProperties\Card;

class CardDisplayer
{
    protected array $cardEntities;

    /**
     * Displays card html with data from DB
     *
     * @param array $cardEntities<CardEntity>
     * @return void
     */
    static public function cardDisplay(array $cardEntities)
    {
    foreach ($cardEntities as $cardEntity){
        echo "<div class='col-sm-12 col-md-4 col-lg-3'>
        <div class='card card__status card__status";
        if ($cardEntity->getStatus() == 'Sold'){
            echo '--sold';
        } elseif ($cardEntity->getStatus() == 'For Sale'){
            echo '--sale';
        } elseif ($cardEntity->getStatus() == 'Let'){
            echo '--letAgreed';
        } else {
            echo '--toLet';
        }
        echo " border border-dark position-relative'>
        <span class='visually-hidden'>New alerts</span>
        <img src='{$cardEntity->getImageUrl()}' class='card-img-top' alt='Photo of {$cardEntity->getAddress()}'>
        <div class='card-body'>
        <p class='card-text'>{$cardEntity->getAddress()}</p>
        <a href='#' class='btn btn-primary btn-sm align-items-end'>PROPERTY DETAILS</a>
        </div></div></div>";
    }
    }
}