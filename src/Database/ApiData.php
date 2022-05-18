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

    /**
     * @return array|mixed
     */
    public function getProperties(): mixed
    {
        return $this->properties;
    }

    /**
     * @return array|mixed
     */
    public function getTypes(): mixed
    {
        return $this->types;
    }

    /**
     * @return array|mixed
     */
    public function getStatuses(): mixed
    {
        return $this->statuses;
    }


}