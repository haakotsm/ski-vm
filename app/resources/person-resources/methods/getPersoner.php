<?php
	/**
	 * Created by PhpStorm.
	 * User: hakon
	 * Date: 12.05.2017
	 * Time: 14.36
	 */
	require_once __DIR__ . '/../personservice.php';
	$eventService = new PersonService();
	try {
		$result = $eventService->getPersoner();
		echo json_encode( $result );
	} catch (mysqli_sql_exception $error) {
		echo $error;
	}
