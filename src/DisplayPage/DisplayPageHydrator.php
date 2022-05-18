<?php

namespace PennyLaneProperties\DisplayPage;

use PDO;

class DisplayPageHydrator
{
    public function getProperty(PDO $db, string $agentRef): array
    {
        $query = $db->prepare("SELECT `agent_ref`,`address_1`,`address_2`,`town`,`postcode`,`description`,`bedrooms`,`price`,`image`,`type`,`status` FROM `properties` WHERE `agent_ref` = :agent_ref;");
        $query->bindParam(":agent_ref", $agentRef);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        return $query->fetch();
    }
}

