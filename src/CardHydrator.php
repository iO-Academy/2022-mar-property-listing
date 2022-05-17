<?php

namespace PennyLaneProperties;

class CardHydrator
{
    /**
     * @param PDO $db
     * @return array<CardEntity>
     */
    public static function getProperties(PDO $db): array
    {
        $query = $db->prepare("SELECT  `agent_ref`, `image`, `address_1`, `address_2`, `town`, `postcode`, `statuses`.
                            `status_name` AS 'status', `types`.`type_name` AS 'type' FROM `properties` LEFT JOIN `statuses` ON `properties`.`status` = 
                        `statuses`.`id` LEFT JOIN `types` ON `properties`.`type` = `types`.`id`");
        $query-> setFetchMode(PDO::FETCH_ASSOC);
        $query-> execute();
        $results = $query->fetchAll();

        $returnArray = [];

        forEach($results as $result){
           $returnArray[] = new CardEntity($result['agent_ref'], $result['image'], $result['address_1'], $result['address_2'], $result['town'], $result['postcode'], $result['status'], $result['type']);
        }

        return $returnArray;

    }
}