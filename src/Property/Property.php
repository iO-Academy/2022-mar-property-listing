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
    protected int $bedrooms = 6;
    protected string $description = 'Lorem Ipsum';
    protected int $price = 355000;
    protected string $imageUrl = "Assets/housePlaceholder.png";

    public function displayCard(): string
    {
        $returnString = "<div class='col-sm-12 col-md-4 col-lg-3 '>"
            . "<div class='card card__status {$this->getStatusClass()}";

        $returnString .= " border border-dark position-relative'>"
            . "<span class='visually-hidden'>New alerts</span>"
            . "<img src='";
        if($this->image){
            $this->imageUrl = 'https://dev.io-academy.uk/resources/property-feed/images/' . $this->image;
        }
        $returnString .= "{$this->imageUrl}"
            . "' class='card-img-top' alt='Photo of {$this->getFullAddress()}'>"
            ."<div class='card-body'>"
            ."<p class='card-text'>{$this->getFullAddress()}</p>"
            ."<a href='displayPage.php?agentRef={$this->agentRef}' class='btn btn-primary btn-sm align-items-end'>PROPERTY DETAILS</a>"
            ."</div></div></div>";

        return $returnString;
    }

    /**
     * @return string
     */
    public function displayPropertyPage(): string
    {
        if($this->image){
            $this->imageUrl = 'https://dev.io-academy.uk/resources/property-feed/images/' . $this->image;
        }

        return "<div class='row mt-5'>"
            . "<div class='card mb-3 rounded card__status {$this->getStatusClass()}'>"
            . "<img class='img-fluid' src='$this->imageUrl'"
            . "<div class='card-body'>"
            . "<h5 class='card-title text-wrap'>{$this->getFullAddress()}</h5>"
            .  "<p class='card-text text-wrap'>£{$this->getFormatPrice()}</p>"
            .  "<p class='card-text text-wrap'>$this->bedrooms Bedrooms</p>"
            .  "<p class='card-text text-wrap'>$this->description</p>";
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

    public function getFormatPrice(): string
    {
        return number_format($this->price,0 , ".", ",");
    }

    public function getStatusClass(): ?string
    {
        if ($this->status == 'Sold') {
            return 'card__status--sold';
        } elseif ($this->status == 'For Sale') {
            return 'card__status--sale';
        } elseif ($this->status == 'Let Agreed') {
            return 'card__status--letAgreed';
        } elseif ($this->status == 'To let'){
            return 'card__status--toLet';
        }
        return NULL;
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

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }


}