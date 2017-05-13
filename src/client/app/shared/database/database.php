<?php

	require __DIR__ . '\..\interfaces\IDatabase.php';

	class Database implements IDatabase {

		private $config;
		private $conn;

		function __construct() {
			if ( !isset( $this->config ) ) {
				$config = require __DIR__ . '\..\..\..\config\config.php';
				$this->config = $config;
			}
			if ( !isset( $this->conn ) ) {
				$this->conn = new mysqli( $this->config->host, $this->config->username, $this->config->password );
				if ( $this->conn->connect_error ) die( "Connection failed: " . $this->conn->connect_error );
				else return $this->create();
			}
		}

		private function create() {
			$text = "Text";
			try {
				$text .= $this->conn->query( "CREATE DATABASE IF NOT EXISTS `" . $this->config->dbname . "`" );
				$text .= $this->conn->select_db( $this->config->dbname );

				$sql = "CREATE TABLE IF NOT EXISTS `" . $this->config->dbname . "`.`brukere`(
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `brukernavn` VARCHAR(256) NOT NULL,
                `passord` VARCHAR(256) NOT NULL);";
				$text .= $this->conn->query( $sql );

				$sql = "CREATE TABLE IF NOT EXISTS `" . $this->config->dbname . "`.`ovelse`(
                `id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `navn` VARCHAR(30) DEFAULT NULL UNIQUE,
                `verdensrekord` VARCHAR(30),
                `rekordholder` VARCHAR(30));";
				$text .= $this->conn->query( $sql );

				$sql = "CREATE TABLE IF NOT EXISTS `" . $this->config->dbname . "`.`person`(
                `id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `fornavn` VARCHAR(30) NOT NULL,
                `etternavn` VARCHAR(30) NOT NULL,
                `telefonnummer` VARCHAR(10) NOT NULL,
                `adresse` VARCHAR(30) NOT NULL,
                `postnummer` CHAR(4) NOT NULL,
                `poststed` VARCHAR(20) NOT NULL);";
				$text .= $this->conn->query( $sql );

				$sql = "CREATE TABLE IF NOT EXISTS `" . $this->config->dbname . "`.`tilskuere`(
                `ovelse_id` INT(10) NOT NULL,
                `tilskuer_id` INT(10) NOT NULL,
                KEY `ovelse` (`ovelse_id`),
                KEY `tilskuer` (`tilskuer_id`),
                CONSTRAINT `ovelse` FOREIGN KEY (`ovelse_id`) REFERENCES `ovelse` (`id`) ON DELETE CASCADE,
                CONSTRAINT `tilskuer` FOREIGN KEY (`tilskuer_id`) REFERENCES `person` (`id`) ON DELETE CASCADE);";
				$this->conn->query( $sql );
				$text .= $this->conn->query( $sql );

				$sql = "CREATE TABLE IF NOT EXISTS `" . $this->config->dbname . "`.`utovere` (
                `ovelse_id` INT(10) NOT NULL,
                `utover_id` INT(10) NOT NULL,
                KEY `utover` (`utover_id`),
                KEY `utover_ovelse` (`ovelse_id`),
                CONSTRAINT `utover` FOREIGN KEY (`utover_id`) REFERENCES `person` (`id`) ON DELETE CASCADE,
                CONSTRAINT `utover_ovelse` FOREIGN KEY (`ovelse_id`) REFERENCES `ovelse` (`id`) ON DELETE CASCADE);";
				$this->conn->query( $sql );
				$text .= $this->conn->query( $sql );
			} catch (mysqli_sql_exception $error) {
				throw $error;
			}
			return $text;
		}

		public function insertStandardData() {
			$sql = "INSERT INTO `person` VALUES   (0,'Petter','Northug','tlf','adr','post','pnr'),
                                                  (0,'Geir','Vogelmann','tlf','adr','post','pnr'),
                                                  (0,'Marit','Bjørgen','tlf','adr','post','pnr'),
                                                  (0,'Felix','Skilaufer','tlf','adr','post','pnr'),
                                                  (0,'Niels','Pettersen','tlf','adr','post','pnr'),
                                                  (0,'Anka','Anderson','tlf','adr','post','pnr'),
                                                  (0,'Kyle','Nguyen','tlf','adr','post','pnr');";
			$this->conn->query( $sql );

			$sql = "INSERT INTO ovelse VALUES (0,'Langrenn Sprint','3.13,76','Frederico Pellegrino'),
                                              (0,'Langrenn 30 km skiathlon','1.09.16,7','Sergej Ustjugov'),
                                              (0,'Hopp Normalbakke','270,8','Stefan Kraft'),
                                              (0,'Hopp Stor Bakke','279,3','Stefan Kraft'),
                                              (0,'Kombinert Normalbakke','26.19,6','Johannes Rydzek'),
                                              (0,'Kombinert Storbakke','26.41,8','Johannes Rydzek');";
			$this->conn->query( $sql );

			$sql = "INSERT INTO utovere VALUES     (1,1),(1,2),(1,3),(1,4),
                                                   (2,1),(2,2),(2,5),
                                                   (3,2),(3,6),(3,7),
                                                   (4,2),(4,6),(4,7),
                                                   (5,1),(5,2),(5,3),(5,4),(5,5),(5,6),(5,7),
                                                   (6,1),(6,2),(6,3),(6,4),(6,5),(6,6),(6,7);";
			$this->conn->query( $sql );
		}

		public function error() {
			return $this->conn->error;
		}

		public function select( $query ) {
			try {
				$result = $this->query( $query );
				if ( !$result ) {
					throw new mysqli_sql_exception( "Tomt resultat" );
				} else {
					return $result;
				}
			} catch (mysqli_sql_exception $error) {
				throw $error;
			}
		}


		public function query( $query ) {
			try {
				return $this->conn->query( $query );
			} catch (mysqli_sql_exception $error) {
				throw $error;
			}
		}

		public function insertId() {
			return $this->conn->insert_id;
		}

		public function quote( $value ) {
			try {
				return "'" . mysqli_real_escape_string( $this->conn, $value ) . "'";
			} catch (mysqli_sql_exception $error) {
				throw $error;
			}
		}

		/**
		 * @return mysqli
		 */
		public function getConn() {
			return $this->conn;
		}

	}