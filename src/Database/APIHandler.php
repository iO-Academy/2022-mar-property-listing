<?php

namespace PennyLaneProperties\Database;

class APIHandler
{
    protected array $properties;
    protected array $types;
    protected array $statuses;

    public function __construct()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://dev.io-academy.uk/resources/property-feed/properties.json");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        $properties = json_decode($output, true);

        curl_setopt($ch, CURLOPT_URL, "https://dev.io-academy.uk/resources/property-feed/types.json");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        $types = json_decode($output, true);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://dev.io-academy.uk/resources/property-feed/statuses.json");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        $statuses = json_decode($output, true);

        curl_close($ch);

        $this->properties = $properties;
        $this->types      = $types;
        $this->statuses   = $statuses;
    }

    /**
     * @return array|mixed
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @return array|mixed
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @return array|mixed
     */
    public function getStatuses()
    {
        return $this->statuses;
    }


}