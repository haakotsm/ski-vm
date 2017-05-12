<?php
	/**
	 * Created by PhpStorm.
	 * User: Duy
	 * Date: 12/05/2017
	 * Time: 12:32
	 */

	include 'app/resources/user-recources/userservice.php';
	include 'app/resources/spectators-recources/spectatorservice.php';
	$options = [
		'cost' => 11
	];

	$us = new UserService();
	echo $us->addUser( 'admin', 'admin' );
	echo $us->addUser( 'admins', 'admins' );
	echo $us->addUser( 'admins1', 'admins1' );
	echo "NÅ TESTER VI <br>";

	echo $us->verifyUser( "morten", "morten" );
	echo $us->verifyUser( "admin", "admin" );


	$ss = new SpectatorService();
	echo var_dump($ss);

	echo $ss->getSpectator();

