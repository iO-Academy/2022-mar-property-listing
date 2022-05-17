<?php

namespace PennyLaneProperties\Card;

class CardDisplayer
{
    protected array $cardEntities;

    /**
     * Displays card html with data from DB
     *
     * @param array $cardEntities<CardEntity>
     * @return string
     */
    static public function displayCards(array $cardEntities): string
    {
        $returnString= '';
    foreach ($cardEntities as $cardEntity){
        $returnString .= "<div class='col-sm-12 col-md-4 col-lg-3 '>
        <div class='card card__status card__status";
        if ($cardEntity->getStatus() == 'Sold'){
            $returnString .= '--sold';
        } elseif ($cardEntity->getStatus() == 'For Sale'){
            $returnString .= '--sale';
        } elseif ($cardEntity->getStatus() == 'Let Agreed'){
            $returnString .='--letAgreed';
        } else {
            $returnString .= '--toLet';
        }
        $returnString .= " border border-dark position-relative'>
        <span class='visually-hidden'>New alerts</span>
        <img src='{$cardEntity->getImageUrl()}' class='card-img-top' alt='Photo of {$cardEntity->getAddress()}'>
        <div class='card-body'>
        <p class='card-text'>{$cardEntity->getAddress()}</p>
        <a href='#' class='btn btn-primary btn-sm align-items-end'>PROPERTY DETAILS</a>
        </div></div></div>";
    }
    return $returnString;
    }
}