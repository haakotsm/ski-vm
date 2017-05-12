<?php
	/**
	 * Created by PhpStorm.
	 * User: hakon
	 * Date: 11.05.2017
	 * Time: 20.45
	 */
	require_once __DIR__ . '/../eventservice.php';
	$eventService = new EventService();
	$name = $_REQUEST[ 'name' ];
	try {
		if ( $name != '' && $name != 'undefined' && !empty( $name ) ) {
			$result = $eventService->addEvent( $id );
			echo $result;
		}
	} catch (mysqli_sql_exception $error) {
		echo $error;
	}