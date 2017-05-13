<?php
	/**
	 * Created by PhpStorm.
	 * User: Duy
	 * Date: 12/05/2017
	 * Time: 12:32
	 */

	include 'app/resources/user-recources/userservice.php';
	include 'app/resources/person-resources/personservice.php';

	$US = new PersonService();
	echo $US->registerAsSpectator( "Raheem", "Sterling", "98844823", "Niels JUels Gate 37A", "Oslo", "0257", "2,5,4" );
