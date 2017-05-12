<?php
	require_once __DIR__ . '\..\..\shared\database\database.php';
	require_once __DIR__ . '\..\..\shared\models\Ovelse.php';

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
			$result = $this->db->query( "INSERT INTO `ovelse` (navn) VALUES (" . $param . ")" );
			if ( !$result ) {
				throw new mysqli_sql_exception( "Feil ved innsetting av person" );
			} else {
				return $result;
			}
		}

		function getEvents() {
			try {
				$eventModels = array();
				$events = $this->db->select( "SELECT * FROM `ovelse`" );
				while ( $rad = mysqli_fetch_array( $events ) ) {
					$readEvent = new Ovelse( $rad[ "id" ], $rad[ "navn" ], $rad[ "verdensrekord" ], $rad[ "rekordholder" ] );
					array_push( $eventModels, $readEvent );
				}

				return $eventModels;
			} catch (mysqli_sql_exception $error) {
				echo $error;
			}
		}

		function updateEvent( $id, $navn, $rekordholder, $rekordtid ) {
			$_id = $this->db->quote( $id );
			$name = $this->db->quote( $navn );
			$holder = $this->db->quote( $rekordholder );
			$tid = $this->db->quote( $rekordtid );
			$result = $this->db->query( "UPDATE `ovelse` SET `navn` = $name, `rekordholder` = $holder, `verdensrekord` = $tid WHERE `id` = $_id" );
			if ( !$result ) {
				throw new mysqli_sql_exception( 'Feil ved oppdatering av ' . $name );
			} else {
				return $result;
			}
		}

		function deleteEvent( $id ) {
			$_id = $id;
			$result = $this->db->query( "DELETE FROM `ovelse` WHERE `id` = $_id" );
			return $result ? $result : $this->db->error();

		}


		function insertWorldRecord( $rekordholder, $rekordtid ) {
			$person = $this->db->quote( $rekordholder );
			$tid = $this->db->quote( $rekordtid );
			try {
				$this->db->query( "INSERT INTO `ovelse` (rekordholder, verdensrekord) VALUES ($person, $tid)" );
			} catch (mysqli_sql_exception $error) {
				echo $error;
			}
		}


		function setWorldRecord( $id, $rekordholder, $rekordtid ) {
			$_id = $this->db->quote( $id );
			$person = $this->db->quote( $rekordholder );
			$tid = $this->db->quote( $rekordtid );
			try {
				$this->db->query( "UPDATE `ovelse` SET rekordholder = $person, verdensrekord = $tid WHERE `id` = $_id" );
			} catch (mysqli_sql_exception $error) {
				echo $error;
			}
		}

		function getError() {
			return $this->db->error();
		}
	}
