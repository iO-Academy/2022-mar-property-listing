<?php

namespace PennyLaneProperties\Database;

class ApiData
{
    protected array $properties;
    protected array $types;
    protected array $statuses;

    public function __construct()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_URL, "https://dev.io-academy.uk/resources/property-feed/properties.json");
        $output = curl_exec($ch);
        $properties = json_decode($output, true);

        curl_setopt($ch, CURLOPT_URL, "https://dev.io-academy.uk/resources/property-feed/types.json");
        $output = curl_exec($ch);
        $types = json_decode($output, true);

        curl_setopt($ch, CURLOPT_URL, "https://dev.io-academy.uk/resources/property-feed/statuses.json");
        $output = curl_exec($ch);
        $statuses = json_decode($output, true);

        curl_close($ch);

        $this->properties = $properties;
        $this->types      = $types;
        $this->statuses   = $statuses;
    }

    public function getProperties()
    {
        return $this->properties;
    }

    public function getTypes()
    {
        return $this->types;
    }

    public function getStatuses()
    {
        return $this->statuses;
    }


}