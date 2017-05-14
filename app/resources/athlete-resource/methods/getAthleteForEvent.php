<?php
/**
 * Created by PhpStorm.
 * User: Duy
 * Date: 13/05/2017
 * Time: 13:42
 */

	require_once __DIR__ . '/../athleteservice.php';
	$athleteService = new AthleteService();

    $eventId = $_REQUEST[ 'eventId' ];


try {
        $result = $athleteService->getAthleteForEvent($eventId);
        echo json_encode($result);
    } catch (mysqli_sql_exception $error) {
        echo $error;
    }
