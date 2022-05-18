<?php

namespace PennyLaneProperties\Property;

use PDO;

class PropertyHydrator
{
    /**
     * @param PDO $db
     * @return array<Property>
     */
    public static function fetchPropertiesDetailsFromDB(PDO $db): array
    {
        $query = $db->prepare("SELECT  `agent_ref` AS 'agentRef', `image`, `address_1`, `address_2`, `town`, `postcode`, `statuses`.
                `status_name` AS 'status', `types`.`type_name` AS 'type' FROM `properties` LEFT JOIN `statuses` ON `properties`.`status` = 
                `statuses`.`id` LEFT JOIN `types` ON `properties`.`type` = `types`.`id`");
        $query-> setFetchMode(PDO::FETCH_CLASS,Property::class);
        $query-> execute();
        return $query->fetchAll();
    }
}