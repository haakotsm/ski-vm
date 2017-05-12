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
	echo "<br> NÅ TESTER VI <br>";
	echo var_dump( $us );

	echo $us->verifyUser( "morten", "morten" );
	echo $us->verifyUser( "admin", "admin" );


	$ss = new SpectatorService();
	echo var_dump( $ss );

	echo $ss->getSpectator();

