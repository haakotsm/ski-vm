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

	if ( $name != '' && $name != 'undefined' ) {
		$result = $eventService->addEvent( $name );
		echo $result;
	} else {
		echo 'gikk bæsj';
	}