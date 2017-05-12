<?php
	/**
	 * Created by PhpStorm.
	 * User: Duy
	 * Date: 12/05/2017
	 * Time: 12:32
	 */

	include 'app/resources/user-recources/userservice.php';
	include 'app/resources/athlete-resource/athleteservice.php';

$AS = new AthleteService();
echo $AS->getAthletes()[0]->fornavn;
echo $AS->getAthleteForEvent(2)[0]->fornavn;
