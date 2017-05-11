<?php

require_once __DIR__.'\..\..\shared\database\database.php';

class UserService {
    private $db;

    function __construct() {

        try {
            $this->db = new Database();
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }

    }
    function addUser( $brukernavn, $passord, $_id) {
        $bnavn = $this->db->quote( $brukernavn );
        $pass = $this->db->quote( $passord );
        $id = $this->db->quote( $_id );
        try {
            $this->db->query( "INSERT INTO `brukere` VALUES $bnavn, $pass, $id" );
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }
    }


    function deleteUser( $id ) {
        $_id = $this->db->quote($id);
        $this->db->query( "DELETE FROM `brukere` WHERE `id` = $_id" );
    }



}