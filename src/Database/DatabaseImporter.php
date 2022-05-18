<?php

namespace PennyLaneProperties\Database;

use PDO;

class DatabaseImporter
{
    protected PDO $db;
    protected APIHandler $APIHandler;

    public function __construct(PDO $db, APIHandler $APIHandler)
    {
        $this->db = $db;
        $this->APIHandler = $APIHandler;
    }

    protected function populateProperties()
    {
        $properties = $this->APIHandler->getProperties();

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
        $types = $this->APIHandler->getTypes();

        $deleteQuery = $this->db->prepare("DELETE FROM `types`;");
        $deleteQuery->execute();

        foreach ($types as $type) {
            $query = $this->db->prepare("INSERT INTO `types` VALUES (:ID, :TYPE_NAME);");
            $query->execute($type);
        }
    }

    protected function populateStatuses()
    {
        $statuses = $this->APIHandler->getStatuses();

        $deleteQuery = $this->db->prepare("DELETE FROM `statuses`;");
        $deleteQuery->execute();

        foreach ($statuses as $status) {
            $query = $this->db->prepare("INSERT INTO `statuses` VALUES (:ID, :STATUS_NAME);");
            $query->execute($status);
        }
    }

    public function populateDatabase()
    {
        $this->populateProperties();
        $this->populateTypes();
        $this->populateStatuses();
    }

}