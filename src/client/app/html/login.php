<?php
	/**
	 * Created by PhpStorm.
	 * User: hakon
	 * Date: 14.05.2017
	 * Time: 23.31
	 */
	require __DIR__ . '\..\resources\user-recources\userservice.php';
	if ( isset( $_REQUEST[ 'username' ] ) && isset( $_REQUEST[ 'password' ] ) ) {
		$username = $_REQUEST[ 'username' ];
		$password = $_REQUEST[ 'password' ];
		if ( !empty( $username ) && !empty( $password ) ) {
			$userService = new UserService();
			$result = $userService->verifyUser($username, $password);
			if($result) {
				$_SESSION['loggetInn'] = $username;
				echo 'app/html/events.php';
				exit();
			}
		} else {
			echo "Brukernavn og passord må fylles inn";
		}
	} else {
		echo "Feil ved brukernavn og passord";
	}