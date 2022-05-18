<?php

namespace PennyLaneProperties\Property;

class Property
{
    protected string $agentRef = "CSL123_100259";
    protected ?string $image = NULL;
    protected string $address_1;
    protected string $address_2 = "Plough Hill Road";
    protected string $town = "Nuneaton";
    protected string $postcode = "CV11 6PE";
    protected string $status = "For Sale";
    protected string $type = "Sale";
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
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getAddress1(): string
    {
        return $this->address_1;
    }

    /**
     * @return string
     */
    public function getAddress2(): string
    {
        return $this->address_2;
    }

    /**
     * @return string
     */
    public function getTown(): string
    {
        return $this->town;
    }

    /**
     * @return string
     */
    public function getPostcode(): string
    {
        return $this->postcode;
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

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @param string $address_1
     */
    public function setAddress1(string $address_1): void
    {
        $this->address_1 = $address_1;
    }


}