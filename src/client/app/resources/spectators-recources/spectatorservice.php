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

        try {
            return $this ->db->select("SELECT 'person.id', 'person.fornavn', 'tilskuere.tilskuer_id' FROM 'person' 
              INNER JOIN 'tilskuere' ON 'person.id' = 'tilskuere.tilskuer_id' ");

        } catch (mysqli_sql_exception $error) {
            echo $error;
        }
    }


}