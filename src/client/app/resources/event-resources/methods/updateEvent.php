<?php
	/**
	 * Created by PhpStorm.
	 * User: hakon
	 * Date: 11.05.2017
	 * Time: 20.45
	 */
	require_once __DIR__ . '/eventservice.php';
	$eventService = new EventService();
	$name = $_REQUEST[ 'name' ];
	$rekordholder = $_REQUEST[ 'rekordholder' ];
	$rekordtid = $_REQUEST[ 'rekordtid' ];

	if ( $name != '' && $name != 'undefined' ) {
		$result = $eventService->updateEvent( $name, $rekordholder, $rekordtid );
		echo $result;
	} else {
		echo 'gikk bæsj';
	}