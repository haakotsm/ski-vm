<?php
	require_once __DIR__ . '/../../shared/database/database.php';
	require_once __DIR__ . '/../../shared/models/Bruker.php';

	class UserService {
		private $db;

		function __construct() {

			try {
				$this->db = new Database();
			} catch (mysqli_sql_exception $error) {
				echo $error;
			}

		}

		function addUser( $username, $password ) {
			$options = [
				'cost' => 11
			];
			$hashedUser = password_hash( $username, PASSWORD_BCRYPT, $options );
			$hashedPass = password_hash( $password, PASSWORD_BCRYPT, $options );

			if ( $hashedPass && $hashedUser ) {
				$uname = $this->db->quote( $hashedUser );
				$pass = $this->db->quote( $hashedPass );

				try {
					$sql = "INSERT INTO `brukere` (id, brukernavn, passord) VALUES (0, $uname, $pass)";
					$result = $this->db->query( $sql );

					if ( !$result ) throw new mysqli_sql_exception( $this->db->error() );
					else return $result;

				} catch (mysqli_sql_exception $error) {
					echo $error;
				}
			} else throw new mysqli_sql_exception( "Passord eller brukernavn kunne ikke registreres" );
		}

		function verifyUser( $username, $password ) {
			$uname = $username;
			$pass = $password;

			try {
				$sql = "SELECT * FROM brukere";
				$result = $this->db->query( $sql );

				if ( !$result ) throw new mysqli_sql_exception( "Feil i bekreftelse av bruker" );
				else {

					while ( $rad = mysqli_fetch_array( $result ) ) {
						$usr = $rad[ 'brukernavn' ];
						$pw = $rad[ 'passord' ];

						$userOK = "yo";
						$passOK = "yo";
						echo "!!!! " . $passOK . " WHY WONT YOU PRINT OUT " . $userOK . " !!!!";

						if ( password_verify( $uname, $usr ) && password_verify( $pass, $pw ) ) {
							return true;
						}
					}
					return false;
				}
			} catch (mysqli_sql_exception $error) {
				echo $error;
			}
		}

		function deleteUser( $_id ) {
			$id = $this->db->quote( $_id );
			try {
				$sql = "DELETE FROM brukere WHERE id = $id";
				$result = $this->db->query( $sql );

				if ( !$result ) throw new mysqli_sql_exception( "Feil ved sletting av person" );
				else return $result;
			} catch (mysqli_sql_exception $error) {
				echo $error;
			}
		}
	}
