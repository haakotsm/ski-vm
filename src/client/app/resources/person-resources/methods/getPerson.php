<?php
	/**
	 * Created by PhpStorm.
	 * User: hakon
	 * Date: 12.05.2017
	 * Time: 14.40
	 */
	require_once __DIR__ . '/../personservice.php';
	$id = $_REQUEST[ 'id' ];
	if ( $id != '' && $id != 'undefined' && !empty( $id ) ) {
		$eventService = new PersonService();
		try {
			$result = $eventService->getPerson( $id );
			echo json_encode( $result );
		} catch (mysqli_sql_exception $error) {
			echo $error;
		}
	}
