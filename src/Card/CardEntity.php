<?php

namespace PennyLaneProperties\Card;

class CardEntity
{
    protected string $address;
    protected string $status;
    protected string $type;
    protected string $imageUrl = "Assets/housePlaceholder.png";
    protected string $agentRef;

    /**
     * @param string $address
     * @param string $status
     * @param string $type
     * @param string $imageUrl
     * @param string $agentRef
     */
    public function __construct($agent_ref, $image, $address_1, $address_2, $town, $postcode, $status, $type)
    {
            $this->address = $this->addressBuilder($address_1, $address_2, $town, $postcode);
            $this->status = $status;
            $this->type = $type;
        if($image){
            $this->imageUrl = 'https://dev.io-academy.uk/resources/property-feed/images/' . $image;
        }
        $this->agentRef = $agent_ref;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
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
     * Takes data from the DB and returns a string of the data formatted based on house name/number.
     * @param $address_1
     * @param $address_2
     * @param $town
     * @param $postcode
     * @return string
     */
    protected function addressBuilder($address_1, $address_2, $town, $postcode){
        if (is_numeric($address_1)){
            $fullAddress = $address_1 . ' '. $address_2 . ', ' . $town . ', ' . $postcode;
        } else {
            $fullAddress = $address_1 . ', '. $address_2 . ', ' . $town . ', ' . $postcode;
        };
        return $fullAddress;
    }

}