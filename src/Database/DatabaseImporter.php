<?php

namespace PennyLaneProperties\Database;

use PDO;

class DatabaseImporter
{

    protected PDO     $db;
    protected ApiData $apiData;

    public function __construct(PDO $db, ApiData $apiData)
    {

        $this->db      = $db;
        $this->apiData = $apiData;
    }

    protected function createTables()
    {
        $query = $this->db->prepare("SET NAMES utf8mb4;
                    DROP TABLE IF EXISTS `properties`;
                    CREATE TABLE `properties` (
                      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                      `agent_ref` varchar(100) DEFAULT NULL,
                      `address_1` varchar(1000) DEFAULT NULL,
                      `address_2` varchar(1000) DEFAULT NULL,
                      `town` varchar(1000) DEFAULT NULL,
                      `postcode` varchar(40) DEFAULT NULL,
                      `description` text DEFAULT NULL,
                      `bedrooms` int(10) DEFAULT NULL,
                      `price` int(10) DEFAULT NULL,
                      `image` varchar(10000) DEFAULT NULL,
                      `type` tinyint(4) DEFAULT NULL,
                      `status` tinyint(4) DEFAULT NULL,
                      PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
                    DROP TABLE IF EXISTS `statuses`;
                    CREATE TABLE `statuses` (
                      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                      `status_name` varchar(30) DEFAULT NULL,
                      PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
                    DROP TABLE IF EXISTS `types`;
                    CREATE TABLE `types` (
                      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                      `type_name` varchar(30) DEFAULT NULL,
                      PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
        $query->execute();
    }

    protected function populateProperties()
    {
        $properties = $this->apiData->getProperties();

        $deleteQuery = $this->db->prepare("DELETE FROM `properties`;");
        $deleteQuery->execute();

        foreach ($properties as $property) {
            $query = $this->db->prepare("INSERT INTO `properties` (`agent_ref`,`address_1`,`address_2`,`town`,`postcode`,`description`,`bedrooms`,`price`,`image`,`type`,`status`)
                                            VALUES (:AGENT_REF,:ADDRESS_1,:ADDRESS_2,:TOWN,:POSTCODE,:DESCRIPTION,:BEDROOMS,:PRICE,:IMAGE,:TYPE,:STATUS);");
            $query->execute($property);
        }
    }

    protected function populateTypes()
    {
        $types = $this->apiData->getTypes();

        $deleteQuery = $this->db->prepare("DELETE FROM `types`;");
        $deleteQuery->execute();

        foreach ($types as $type) {
            $query = $this->db->prepare("INSERT INTO `types` VALUES (:ID, :TYPE_NAME);");
            $query->execute($type);
        }
    }

    protected function populateStatuses()
    {
        $statuses = $this->apiData->getStatuses();

        $deleteQuery = $this->db->prepare("DELETE FROM `statuses`;");
        $deleteQuery->execute();

        foreach ($statuses as $status) {
            $query = $this->db->prepare("INSERT INTO `statuses` VALUES (:ID, :STATUS_NAME);");
            $query->execute($status);
        }
    }

    public function populateDatabase()
    {
        $this->createTables();
        $this->populateProperties();
        $this->populateTypes();
        $this->populateStatuses();
    }

}