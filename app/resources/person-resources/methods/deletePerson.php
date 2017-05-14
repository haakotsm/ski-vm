<?php
	/**
	 * Created by PhpStorm.
	 * User: hakon
	 * Date: 12.05.2017
	 * Time: 14.32
	 */
	$id = $_REQUEST[ 'id' ];

	require_once __DIR__ . '\..\personservice.php';

	$personService = new PersonService();
	if($id != '' && $id = 'undefined' && !empty($id)) {
		$result = $personService->deletePerson($id);

	}