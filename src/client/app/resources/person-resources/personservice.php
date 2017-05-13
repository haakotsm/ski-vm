<?php

	require_once __DIR__ . '\..\..\shared\database\database.php';

	class PersonService {
		private $db;

		function __construct() {
			try {
				$this->db = new Database();
			} catch (mysqli_sql_exception $error) {
				echo $error;
			}
		}

		function addPerson( $fornavn, $etternavn, $telefonnummer, $adresse, $poststed, $postnummer ) {
			$fnavn = $this->db->quote( $fornavn );
			$enavn = $this->db->quote( $etternavn );
			$tlf = $this->db->quote( $telefonnummer );
			$adr = $this->db->quote( $adresse );
			$psted = $this->db->quote( $poststed );
			$pnr = $this->db->quote( $postnummer );

			$sql = "INSERT INTO person VALUES (0, $fnavn, $enavn, $tlf, $adr, $psted, $pnr )";

			$result = $this->db->query( $sql );
			if ( !$result ) {
				throw new mysqli_sql_exception( $this->db->error() );
			} else {
				return $result;
			}
		}

		function registerAsSpectator($personId, $eventIdArr){
            try{
                for($i = 0; $i < count($eventIdArr); $i++){
                    $sql = "INSERT INTO tilskuere 
                            VALUES($eventIdArr[$i],$personId)";
                    $this->db->query( $sql );
                }
            } catch (mysqli_sql_exception $err){
                return $err;
            }

            return true;
        }

		function getPersoner() {
			$result = $this->db->select( "SELECT * FROM `person`" );
			if ( !$result ) {
				throw new mysqli_sql_exception( "Feil get henting av person" );
			} else {
				return $result;
			}
		}

		function getPerson( $id ) {
			$result = $this->db->select( "SELECT * FROM `person` WHERE id = $id" );
			if ( !$result ) {
				throw new mysqli_sql_exception( "Feil get henting av person" );
			} else {
				return $result;
			}
		}

		function updatePerson( $_id, $fornavn, $etternavn, $telefonnummer, $adresse, $poststed, $postnummer ) {
			$fnavn = $this->db->quote( $fornavn );
			$enavn = $this->db->quote( $etternavn );
			$tlf = $this->db->quote( $telefonnummer );
			$adr = $this->db->quote( $adresse );
			$psted = $this->db->quote( $poststed );
			$pnr = $this->db->quote( $postnummer );
			$id = $this->db->quote( $_id );
			$this->db->query( "UPDATE 'person' SET 'fornavn'= $fnavn, 'etternavn'= $enavn, 'telefonnummer' = $tlf, 'adresse' = $adr, 'poststed'= $psted, 'postnummer'=$pnr  WHERE 'id' = $id" );
		}

		function deletePerson( $id ) {
			$_id = $this->db->quote( $id );
			$this->db->query( "DELETE FROM `person` WHERE `id` = $_id" );
		}

		function insertStdData(){
		    $this->db->insertStandardData();
        }

	}