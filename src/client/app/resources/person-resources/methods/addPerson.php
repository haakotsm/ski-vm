<?php
	/**
	 * Created by PhpStorm.
	 * User: hakon
	 * Date: 12.05.2017
	 * Time: 14.36
	 */
	require_once __DIR__ . '/../personservice.php';
	$personService = new PersonService();
	$fornavn = $_REQUEST[ 'fornavn' ];
	$etternavn = $_REQUEST[ 'etternavn' ];
	$telefonnummer = $_REQUEST[ 'tlf' ];
	$adresse = $_REQUEST[ 'fornavn' ];
	$poststed = $_REQUEST[ 'fornavn' ];
	$postnummer = $_REQUEST[ 'fornavn' ];
	try {
		if ( $name != '' && $name != 'undefined' && !empty( $name ) ) {
			$result = $personService->addPerson( $id );
			echo $result;
		}
	} catch (mysqli_sql_exception $error) {
		echo $error;
	}