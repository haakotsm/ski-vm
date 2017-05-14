<?php

require_once __DIR__ . '\\..\\..\\shared\\database\\database.php';
require_once __DIR__ . '\\..\\..\\shared\\models\\Spectator.php';

class SpectatorService
{
    function __construct()
    {

        try {
            $this->db = new Database();
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }
    }

    function getSpectator()
    {
        try {
            $spectatorModels = array();
            $sql = "SELECT person.id, person.fornavn, person.etternavn, person.telefonnummer,person.adresse, person.poststed, person.postnummer, tilskuere.tilskuer_id, tilskuere.ovelse_id 
                    FROM person 
                    INNER JOIN tilskuere ON person.id = tilskuere.tilskuer_id";
            $result = $this->db->select($sql);

            if (!$result) throw new mysqli_sql_exception("Feil i bekreftelse av bruker");
            while ($rad = mysqli_fetch_array($result)) {
                $readSpectator = new Spectator($rad["id"], $rad["fornavn"], $rad["etternavn"], $rad["telefonnummer"], $rad["adresse"], $rad["postnummer"], $rad["poststed"], $rad["ovelse_id"]);
                array_push($spectatorModels, $readSpectator);
            }

            return $spectatorModels;
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }
    }

    function getSpectatorsForEvent($eventId)
    {
        $spectators = $this->getSpectator();
        $eventSpecs = array();
        for ($i = 0; $i < count($spectators); $i++) {
            if ($spectators[$i]->event == $eventId) array_push($eventSpecs, $spectators[$i]);
        }
        return $eventSpecs;
    }
}

