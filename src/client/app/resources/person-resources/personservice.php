<?php

	require_once __DIR__ . '\\..\\..\\shared\\database\\database.php';

	class PersonService {
		private $db;

		function __construct() {
			try {
				$this->db = new Database();
			} catch (mysqli_sql_exception $error) {
				echo $error;
			}
		}

        function registerAsAthlete( $fornavn, $etternavn, $eventIdArr ) {
            $result = "";
            try {
                //No need for full personalia of athletes
                $this->addPerson( $fornavn, $etternavn, "tlf", "adr", "poststed", "postnr");
                $eventIdArr = explode( ',', $eventIdArr );
                $id = $this->db->insertId();
                for ( $i = 0; $i < count( $eventIdArr ); $i++ ) {

                    $sql = "INSERT INTO `utovere` 
                            VALUES ( $eventIdArr[$i], $id )";
                    echo $sql;
                    $result .= $this->db->query( $sql );
                }
            } catch (mysqli_sql_exception $err) {
                return $err;
            }
            if ( !$result ) {
                return $this->db->error();
            }
            return $result;
        }

        function registerAsSpectator( $fornavn, $etternavn, $telefonnummer, $adresse, $poststed, $postnummer, $eventIdArr ) {
			$result = "";
			try {
				$this->addPerson( $fornavn, $etternavn, $telefonnummer, $adresse, $poststed, $postnummer );
				$eventIdArr = explode( ',', $eventIdArr );
				$id = $this->db->insertId();
				for ( $i = 0; $i < count( $eventIdArr ); $i++ ) {

					$sql = "INSERT INTO `tilskuere` 
                            VALUES ( $eventIdArr[$i], $id )";
					echo $sql;
					$result .= $this->db->query( $sql );
				}
			} catch (mysqli_sql_exception $err) {
				return $err;
			}
			if ( !$result ) {
				return $this->db->error();
			}
			return $result;
		}

		function addPerson( $fornavn, $etternavn, $telefonnummer, $adresse, $poststed, $postnummer ) {
			$regCheck = $this->regExName( $fornavn, $etternavn, $telefonnummer, $adresse, $poststed, $postnummer );
			if ( !$regCheck ) {
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
			} else return $regCheck;
		}

		private function regExName( $fornavn, $etternavn, $telefonnummer, $adresse, $poststed, $postnummer ) {
			$regError = false;
			if ( !preg_match( '/^([a-zA-zæøåÆØÅ\- ]+)$/', $fornavn ) ) {
				$regError .= "Feil i fornavn <br>";
			}
			if ( !preg_match( '/^([a-zA-zæøåÆØÅ\- ]+)$/', $etternavn ) ) {
				$regError .= "Feil i etternavn <br>";
			}
			if ( !preg_match( '/^((0047)?|(\+47)?|(47)?)\d{8}$/', $telefonnummer ) ) {
				$regError .= "Feil i telefonnummer <br>";
			}
			if ( !preg_match( '/^([a-zA-zæøåÆØÅ\- ]+)((,? ?)\d+([a-zA-z])?){1}$/', $adresse ) ) {
				$regError .= "Feil i adresse <br>";
			}
			if ( !preg_match( '/^([a-zA-zæøåÆØÅ\- ]+)$/', $poststed ) ) {
				$regError .= "Feil i poststed <br>";
			}
			if ( !preg_match( '/^(\d{4})$/', $postnummer ) ) {
				$regError .= "Feil i postnummer <br>";
			}
			return $regError;
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
			$regCheck = $this->regExName( $fornavn, $etternavn, $telefonnummer, $adresse, $poststed, $postnummer );
			if ( !$regCheck ) {
				$fnavn = $this->db->quote( $fornavn );
				$enavn = $this->db->quote( $etternavn );
				$tlf = $this->db->quote( $telefonnummer );
				$adr = $this->db->quote( $adresse );
				$psted = $this->db->quote( $poststed );
				$pnr = $this->db->quote( $postnummer );
				$id = $this->db->quote( $_id );
				$result = $this->db->query( "UPDATE 'person' SET 'fornavn'= $fnavn, 'etternavn'= $enavn, 'telefonnummer' = $tlf, 'adresse' = $adr, 'poststed'= $psted, 'postnummer'=$pnr  WHERE 'id' = $id" );
				if ( !$result ) {
					return $this->db->error();
				} else {
					return $result;
				}
			} else {
				return $regCheck;
			}
		}

		function deletePerson( $id ) {
			$_id = $this->db->quote( $id );
			$result = $this->db->query( "DELETE FROM `person` WHERE `id` = $_id" );
			if ( !$result ) {
				return $this->db->error();
			} else {
				return $result;
			}
		}

		function insertStdData() {
			$this->db->insertStandardData();
		}
	}