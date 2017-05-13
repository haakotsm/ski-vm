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
		$regError = false;
		if ( !preg_match( '/^([a-zA-zæøåÆØÅ\- ]+)$/', $fornavn ) ) {
			$regError .= "Feil i fornavn <br>";
		}
		if ( !preg_match( '/^([a-zA-zæøåÆØÅ\- ]+)$/', $etternavn ) ) {
			$regError .= "Feil i etternavn <br>";
		}
		if ( !preg_match( '/^((0047)?|(\+47)?|(47)?)\d{8}$/', $telefonnummer ) ) {
			$regError .= "Feil i telefonnummer <br>";
		}
		if ( !preg_match( '/^([a-zA-zæøåÆØÅ\- ]+)((,? ?)\d+([a-zA-z])?){1}$/', $adresse ) ) {
			$regError .= "Feil i adresse <br>";
		}
		if ( !preg_match( '/^([a-zA-zæøåÆØÅ\- ]+)$/', $poststed ) ) {
			$regError .= "Feil i poststed <br>";
		}
		if ( !preg_match( '/^(\d{4})$/', $postnummer ) ) {
			$regError .= "Feil i postnummer <br>";
		}
		if ( $regError ) {
			echo $regError;
			return;
		}
		if ( $fornavn != '' && $fornavn != 'undefined' && !empty( $fornavn ) &&
			$etternavn != '' && $etternavn != 'undefined' && !empty( $etternavn ) &&
			$telefonnummer != '' && $telefonnummer != 'undefined' && !empty( $telefonnummer ) &&
			$adresse != '' && $adresse != 'undefined' && !empty( $adresse ) &&
			$poststed != '' && $poststed != 'undefined' && !empty( $poststed ) &&
			$postnummer != '' && $postnummer != 'undefined' && !empty( $postnummer ) &&
			$ovelseid != '' && $ovelseid != 'undefined' && !empty( $ovelseid )
		) {
			$result = $personService->addPerson( $fornavn, $etternavn, $telefonnummer, $adresse, $poststed, $postnummer );
			$id = $result[ 'id' ];
			$personService->registerAsSpectator( $id, $ovelseid );
			echo $result;
		} else {
			throw new mysqli_sql_exception( "Feil ved innlegging av person" );
		}
	} catch (mysqli_sql_exception $error) {
		echo $error;
	}