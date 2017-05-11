<?php

require_once __DIR__.'\..\..\shared\database\database.php';

class PersonService{
    private $db;

    function __construct() {

        try {
            $this->db = new Database();
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }

    }
    function addPerson( $fornavn, $etternavn, $telefonnummer, $adresse, $poststed, $postnummer ) {
        $fnavn = $this->db->quote( $fornavn );
        $enavn = $this->db->quote( $etternavn );
        $tlf = $this->db->quote( $telefonnummer );
        $adr = $this->db->quote( $adresse );
        $psted = $this->db->quote( $poststed );
        $pnr = $this->db->quote( $postnummer );
        try {
            $this->db->query( "INSERT INTO `person` VALUES $fnavn, $enavn, $tlf, $adr, $psted, $pnr" );
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }
    }

    function getPerson() {
        try {
            return $this->db->select( "SELECT * FROM `person`" );
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }
    }


    function updatePerson( $_id, $fornavn, $etternavn, $telefonnummer, $adresse, $poststed, $postnummer) {
        $fnavn = $this->db->quote( $fornavn );
        $enavn = $this->db->quote( $etternavn );
        $tlf = $this->db->quote( $telefonnummer );
        $adr = $this->db->quote( $adresse );
        $psted = $this->db->quote( $poststed );
        $pnr = $this->db->quote( $postnummer );
        $id = $this->db>quote($_id);
        $this->db->query( "UPDATE 'person' SET 'fornavn'= $fnavn, 'etternavn'= $enavn, 'telefonnummer' = $tlf, 
            'poststed'= $psted, 'postnummer'=$pnr  WHERE 'id' = $id" );
    }

    function deletePerson( $id ) {
        $_id = $this->db->quote($id);
        $this->db->query( "DELETE FROM `person` WHERE `id` = $_id" );
    }



}