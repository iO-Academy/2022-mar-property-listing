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
        $queryString = "SELECT  `agent_ref` AS 'agentRef', `image`, `address_1`, `address_2`, `town`, `postcode`, `statuses`.
        `status_name` AS 'status', `types`.`type_name` AS 'type' FROM `properties` LEFT JOIN `statuses` ON `properties`.`status` = 
        `statuses`.`id` LEFT JOIN `types` ON `properties`.`type` = `types`.`id`";

        if (isset($_GET['type'])) {
            if ($_GET['type'] == 1) {
                $queryString .= " WHERE `type_name`= 'Sale'";
            }

            if ($_GET['type'] == 2) {
                $queryString .= " WHERE `type_name`= 'Let'";
            }
        }

        $query = $db->prepare($queryString);
        $query->setFetchMode(PDO::FETCH_CLASS,Property::class);
        $query->execute();
        return $query->fetchAll();
    }
}