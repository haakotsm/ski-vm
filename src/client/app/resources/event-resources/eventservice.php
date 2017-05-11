<?php

	require_once __DIR__ . '\..\..\shared\database\database.php';

	class EventService {
		private $db;

		function __construct() {
			try {
				$this->db = new Database();
			} catch (mysqli_sql_exception $error) {
				echo $error;
			}

		}

		function addEvent( $navn ) {
			$param = $this->db->quote( $navn );
			try {
				$this->db->query( "INSERT INTO `ovelse` (navn) VALUE $param" );
			} catch (mysqli_sql_exception $error) {
				echo $error;
			}
		}

		function getEvents() {
			try {
				return $this->db->select( "SELECT * FROM `ovelse`" );
			} catch (mysqli_sql_exception $error) {
				echo $error;
			}
		}

		function insertWorldRecord( $rekordholder, $rekordtid ) {
			$person = $this->db->quote( $rekordholder );
			$tid = $this->db->quote( $rekordtid );
			try {
				$this->db->query( "INSERT INTO `ovelse` (rekordholder, verdensrekord) VALUE ($person, $tid)" );
			} catch (mysqli_sql_exception $error) {
				echo $error;
			}
		}

		function updateValues( $id, $navn, $rekordholder, $rekordtid ) {
			$_id = $this->db->quote( $id );
			$name = $this->db->quote( $navn );
			$holder = $this->db->quote( $rekordholder );
			$tid = $this->db->quote( $rekordtid );
			$this->db->query( "UPDATE `ovelse` SET `navn` = $name, `rekordholder` = $holder, `verdensrekord` = $tid WHERE `id` = $_id" );
		}

	}


