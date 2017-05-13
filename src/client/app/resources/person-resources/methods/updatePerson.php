<?php
	/**
	 * Created by PhpStorm.
	 * User: hakon
	 * Date: 12.05.2017
	 * Time: 14.34
	 */
	$personService = new PersonService();

	$id = $_REQUEST[ 'id' ];
	$fornavn = $_REQUEST[ 'fornavn' ];
	$etternavn = $_REQUEST[ 'etternavn' ];
	$telefonnummer = $_REQUEST[ 'telefon' ];
	$adresse = $_REQUEST[ 'adresse' ];
	$poststed = $_REQUEST[ 'poststed' ];
	$postnummer = $_REQUEST[ 'postnr' ];


	try {

		if ( $id != '' && $id != 'undefined' && !empty( $id ) &&
			$fornavn != '' && $fornavn != 'undefined' && !empty( $fornavn ) &&
			$etternavn != '' && $etternavn != 'undefined' && !empty( $etternavn ) &&
			$telefonnummer != '' && $telefonnummer != 'undefined' && !empty( $telefonnummer ) &&
			$adresse != '' && $adresse != 'undefined' && !empty( $adresse ) &&
			$poststed != '' && $poststed != 'undefined' && !empty( $poststed ) &&
			$postnummer != '' && $postnummer != 'undefined' && !empty( $postnummer )
		) {
			echo
			$personService->updatePerson( $id, $fornavn, $etternavn, $telefonnummer, $adresse, $poststed, $postnummer );

		} else {
			throw new mysqli_sql_exception( "Feil ved innlegging av person" );
		}
	} catch (mysqli_sql_exception $error) {
		echo $error;
	}