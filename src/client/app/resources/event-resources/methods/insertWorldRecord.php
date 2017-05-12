<?php
	/**
	 * Created by PhpStorm.
	 * User: hakon
	 * Date: 11.05.2017
	 * Time: 20.45
	 */
	require_once __DIR__ . '/../eventservice.php';
	$eventService = new EventService();
	$rekordholder = $_REQUEST[ 'rekordholder' ];
	$rekordtid = $_REQUEST[ 'verdensrekord' ];

	if ( $rekordholder != '' && $rekordholder != 'undefined' && !empty( $rekordholder ) &&
		$rekordtid != '' && $rekordtid != 'undefined' && !empty( $rekordholder )
	) {
		$result = $eventService->insertWorldRecord( $rekordholder, $rekordtid );
		echo $result;
	} else {
		echo 'gikk bæsj';
	}