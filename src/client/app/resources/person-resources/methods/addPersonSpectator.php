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
	$telefonnummer = $_REQUEST[ 'telefon' ];
	$adresse = $_REQUEST[ 'adresse' ];
	$poststed = $_REQUEST[ 'poststed' ];
	$postnummer = $_REQUEST[ 'postnr' ];
	$ovelseid = $_REQUEST[ 'ovelseid' ];


	try {

		if ( $fornavn != '' && $fornavn != 'undefined' && !empty( $fornavn ) &&
			$etternavn != '' && $etternavn != 'undefined' && !empty( $etternavn ) &&
			$telefonnummer != '' && $telefonnummer != 'undefined' && !empty( $telefonnummer ) &&
			$adresse != '' && $adresse != 'undefined' && !empty( $adresse ) &&
			$poststed != '' && $poststed != 'undefined' && !empty( $poststed ) &&
			$postnummer != '' && $postnummer != 'undefined' && !empty( $postnummer ) &&
			$ovelseid != '' && $ovelseid != 'undefined' && !empty( $ovelseid )
		) {
			echo
			$personService->registerAsSpectator( $fornavn, $etternavn, $telefonnummer, $adresse, $poststed, $postnummer, $ovelseid );

		} else {
			throw new mysqli_sql_exception( "Feil ved innlegging av person" );
		}
	} catch (mysqli_sql_exception $error) {
		echo $error;
	}