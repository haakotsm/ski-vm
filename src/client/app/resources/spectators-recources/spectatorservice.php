<?php

require_once __DIR__.'\..\..\shared\database\database.php';
require_once __DIR__.'\..\..\shared\models\Person.php';
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
            $spectatorModels = array();
            $sql="SELECT person.id, person.fornavn, person.etternavn, person.telefonnummer,person.adresse, person.poststed, person.postnummer, tilskuere.tilskuer_id 
                  FROM person 
                  INNER JOIN tilskuere ON person.id = tilskuere.tilskuer_id";
            $result = $this->db->select( $sql );

            if (!$result) throw new mysqli_sql_exception("Feil i bekreftelse av bruker");
            echo "eg hater dette: ".count($result);
            while ( $rad = mysqli_fetch_array( $result ) ) {
                $readPerson = new Person($rad["id"],$rad["fornavn"],$rad["etternavn"],$rad["telefonnummer"],$rad["adresse"],$rad["postnummer"],$rad["poststed"]);
                echo "<br>$readPerson->fornavn<br>";
                array_push( $spectatorModels, $readPerson);
            }

            return $spectatorModels;
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }
    }
}