<?php
	/**
	 * Created by PhpStorm.
	 * User: hakon
	 * Date: 11.05.2017
	 * Time: 20.45
	 */
	require_once __DIR__ . '/../eventservice.php';
	$eventService = new EventService();
	$id = $_REQUEST[ 'id' ];

	if ( $id != '' && $id != 'undefined' && !empty( $id ) ) {
		$result = $eventService->deleteEvent( $id );
		echo $result;
	} else {
		echo '';
	}