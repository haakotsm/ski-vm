<?php

require_once __DIR__.'\..\..\shared\database\database.php';
require_once __DIR__.'\..\..\shared\models\Athlete.php';
class AthleteService
{
    function __construct() {

        try {
            $this->db = new Database();
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }

    }

    function getAthletes() {
        try {
            $athleteModels = array();
            $sql="SELECT person.id, person.fornavn, person.etternavn, person.telefonnummer,person.adresse, person.poststed, person.postnummer, utovere.utover_id, utovere.ovelse_id 
                  FROM person 
                  INNER JOIN utovere ON person.id = utovere.utover_id";
            $result = $this->db->select( $sql );

            if (!$result) throw new mysqli_sql_exception("Feil i henting av utøvere");
            while ( $rad = mysqli_fetch_array( $result ) ) {
                $readAthlete = new Athlete($rad["id"],$rad["fornavn"],$rad["etternavn"],$rad["telefonnummer"],$rad["adresse"],$rad["postnummer"],$rad["poststed"],$rad["ovelse_id"]);
                array_push( $athleteModels, $readAthlete);
            }

            return $athleteModels;
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }
    }

    function getDistinctAthletes() {
        try {
            $athleteModels = array();
            $sql="SELECT person.id, person.fornavn, person.etternavn, person.telefonnummer,person.adresse, person.poststed, person.postnummer, utovere.utover_id, utovere.ovelse_id 
                  FROM person 
                  INNER JOIN utovere ON person.id = utovere.utover_id 
                  GROUP BY person.id";
            $result = $this->db->select( $sql );

            if (!$result) throw new mysqli_sql_exception("Feil i henting av utøvere");
            while ( $rad = mysqli_fetch_array( $result ) ) {
                $readAthlete = new Athlete($rad["id"],$rad["fornavn"],$rad["etternavn"],$rad["telefonnummer"],$rad["adresse"],$rad["postnummer"],$rad["poststed"],$rad["ovelse_id"]);
                array_push( $athleteModels, $readAthlete);
            }

            return $athleteModels;
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }
    }

    function getAthleteForEvent($eventId){
        $athletes = $this->getAthletes();
        $eventAthletes =  array();
        for ($i = 0; $i < count($athletes); $i++){
            if ($athletes[$i]->event == $eventId) array_push($eventAthletes, $athletes[$i]);
        }
        return $eventAthletes;
    }
}
