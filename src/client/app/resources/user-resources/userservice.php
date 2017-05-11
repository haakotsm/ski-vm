<?php

	require_once __DIR__.'\..\..\shared\database\database.php';

	class UserService {
		private $db;

		function __construct() {

			try {
				$this->db = new Database();
			} catch (mysqli_sql_exception $error) {
				echo $error;
			}

		}
		function addUser( $fornavn, $etternavn, $telefonnummer, $adresse, $poststed, $postnummer ) {
			$fnavn = $this->db->quote( $fornavn );
			$enavn = $this->db->quote( $etternavn );
			$tlf = $this->db->quote( $telefonnummer );
			$adr = $this->db->quote( $adresse );
			$psted = $this->db->quote( $poststed );
			$pnr = $this->db->quote( $postnummer );
			try {
				$this->db->query( "INSERT INTO `person` VALUES $fnavn, $enavn, $tlf, $adr, $psted, $pnr" );
			} catch (mysqli_sql_exception $error) {
				echo $error;
			}
		}

		function getUsers() {
			try {
				return $this->db->select( "SELECT * FROM `person`" );
			} catch (mysqli_sql_exception $error) {
				echo $error;
			}
		}

		function insertWorldRecord( $rekordholder, $rekordtid ) {
			$person = $this->db->quote( $rekordholder );
			$tid = $this->db->quote( $rekordtid );
			try {
				$this->db->query( "INSERT INTO `person` (rekordholder, verdensrekord) VALUE ($person, $tid)" );
			} catch (mysqli_sql_exception $error) {
				echo $error;
			}
		}

		function updateValues( $id, $navn, $rekordholder, $rekordtid ) {
			$_id = $this->db->quote( $id );
			$name = $this->db->quote( $navn );
			$holder = $this->db->quote( $rekordholder );
			$tid = $this->db->quote( $rekordtid );
			$this->db->query( "UPDATE `person` SET `navn` = $name, `rekordholder` = $holder, `verdensrekord` = $tid WHERE `id` = $_id" );
		}

		function deleteUser( $id ) {
			$_id = $id;
			$this->db->query( "DELETE FROM `person` WHERE `id` = $_id" );
		}



	}