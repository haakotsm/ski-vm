<?php

require_once __DIR__.'\..\..\shared\database\database.php';

class SpectatorService
{
    function __construct() {

        try {
            $this->db = new Database();
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }

    }

    function getSpectator() {

        $spectators = array();

        try {
            $sql = $this ->db->select("SELECT 'person.id', 'person.fornavn', 'person.etternavn', 'person.telefonnummer',
        'person.adresse', 'person.poststed', 'person.postnummer', 'tilskuere.tilskuer_id' FROM 'person' 
              INNER JOIN 'tilskuere' ON 'person.id' = 'tilskuere.tilskuer_id' ");


            
            foreach ($sql as $spectator){

                $person = new Person($spectator->id, $spectator->fornavn, $spectator->telefonnummer, $spectator->adresse, $spectator->poststed,
                    $spectator->postnummer);

                array_push($spectators, $spectator);

            }


        } catch (mysqli_sql_exception $error) {
            echo $error;
        }
    }





}