<?php
	/**
	 * Created by PhpStorm.
	 * User: hakon
	 * Date: 13.05.2017
	 * Time: 15.32
	 */
	include_once __DIR__ . '\\..\\spectatorservice.php';
	$spectatorService = new SpectatorService();
	try {
		if ( isset( $_REQUEST[ 'event' ] ) ) {
			$event = $_REQUEST[ 'event' ];
			$result = $spectatorService->getSpectatorsForEvent( $event );
			echo json_encode( $result );
		} else {
			$result = $spectatorService->getSpectator();
			echo json_encode( $result );
		}
	} catch (mysqli_sql_exception $error) {
		echo $error;
	}