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

    function addUser($_id, $username, $password) {
        $options = [
            'cost' => 11
        ];

        $hashedPass = password_hash($password, PASSWORD_BCRYPT, $options);
        $hashedUser = password_hash($username, PASSWORD_BCRYPT, $options);
        echo "NÅ KJØRER KODEN <br>";
        if($hashedPass && $hashedUser ){
            $uname = $this->db->quote( $username );
            $pass = $this->db->quote( $password );
            $id = $this->db->quote( $_id );

            try {
                $sql = "INSERT INTO 'brukere'(id, brukernavn, passord) VALUES($id,$uname,$pass)";
                $this->db->query($sql);
            } catch (mysqli_sql_exception $error) {
                echo $error;
            }

            return true;
        }

        else throw new mysqli_sql_exception("Passord eller brukernavn kunne ikke registreres");
    }

    function verifyUser($username, $password, $_id){
        $uname = $this->db->quote( $username );
        $pass = $this->db->quote( $password );
        $id = $this->db->quote( $_id );


    }

    function deleteUser( $_id ) {
        $id = $this->db->quote($_id);
        $sql = "DELETE FROM `brukere` WHERE `id` = $id";
        $this->db->query( $sql );
    }
}