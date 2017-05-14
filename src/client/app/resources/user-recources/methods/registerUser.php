<?php
	/**
	 * Created by PhpStorm.
	 * User: hakon
	 * Date: 14.05.2017
	 * Time: 23.04
	 */
	require __DIR__.'\..\userservice.php';
	if ( isset( $_REQUEST[ 'username' ] ) && isset( $_REQUEST[ 'password' ] ) ) {
		$username = $_REQUEST[ 'username' ];
		$password = $_REQUEST[ 'password' ];
		if ( !empty( $username ) && !empty( $password ) ) {
			$userService = new UserService();
			$result = $userService->addUser($username, $password);
			if($result) {
				echo "$username er registrert";
			}
		} else {
			echo "Brukernavn og passord må fylles inn";
		}
	} else {
		echo "Feil ved brukernavn og passord";
	}