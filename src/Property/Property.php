<?php

namespace PennyLaneProperties\Property;

class Property
{
    protected string $agentRef;
    protected string $image;
    protected string $address_1;
    protected string $address_2;
    protected string $town;
    protected string $postcode;
    protected string $status;
    protected string $type;
    protected string $imageUrl = "Assets/housePlaceholder.png";


    public function displayCard(): string
    {
        $returnString = "<div class='col-sm-12 col-md-4 col-lg-3 '>"
            . "<div class='card card__status card__status";
        if ($this->status == 'Sold') {
            $returnString .= '--sold';
        } elseif ($this->status == 'For Sale') {
            $returnString .= '--sale';
        } elseif ($this->status == 'Let Agreed') {
            $returnString .= '--letAgreed';
        } else {
            $returnString .= '--toLet';
        }
        $returnString .= " border border-dark position-relative'>"
            . "<span class='visually-hidden'>New alerts</span>"
            . "<img src='";
        if($this->image){
            $this->imageUrl = 'https://dev.io-academy.uk/resources/property-feed/images/' . $this->image;
        }
        $returnString .= "{$this->getImageUrl()}"
            . "' class='card-img-top' alt='Photo of {$this->getFullAddress()}'>"
            ."<div class='card-body'>"
            ."<p class='card-text'>{$this->getFullAddress()}</p>"
            ."<a href='#' class='btn btn-primary btn-sm align-items-end'>PROPERTY DETAILS</a>"
            ."</div></div></div>";

        return $returnString;
    }

    /**
     * @return string
     */
    public function getFullAddress(): string
    {
        if (is_numeric($this->address_1)){
            $fullAddress = $this->address_1 . ' '. $this->address_2 . ', ' . $this->town . ', ' . $this->postcode;
        } else {
            $fullAddress = $this->address_1 . ', '. $this->address_2 . ', ' . $this->town . ', ' . $this->postcode;
        };

        return $fullAddress;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * This will be used in story 3
     * @return string
     */
    public function getAgentRef(): string
    {
        return $this->agentRef;
    }

}