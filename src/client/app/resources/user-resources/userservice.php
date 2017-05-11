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



	}