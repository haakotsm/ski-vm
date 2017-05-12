<?php
	/**
	 * Created by PhpStorm.
	 * User: Duy
	 * Date: 12/05/2017
	 * Time: 12:32
	 */

	include 'app/resources/user-recources/userservice.php';
	include 'app/resources/athlete-resource/athleteservice.php';
	include 'app/resources/person-resources/personservice.php';

	$US = new PersonService();
	echo $US->addPerson( "David", "Silva", "nummer", "adresse", "opost", "nummer" );
