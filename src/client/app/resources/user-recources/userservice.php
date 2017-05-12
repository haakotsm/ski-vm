<?php

require_once __DIR__ . '\..\..\shared\database\database.php';
require_once __DIR__ . '\..\..\shared\models\Bruker.php';

class UserService
{
    private $db;

    function __construct()
    {

        try {
            $this->db = new Database();
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }

    }

    function addUser($username, $password)
    {
        $options = [
            'cost' => 11
        ];

        $hashedPass = password_hash($password, PASSWORD_BCRYPT, $options);
        $hashedUser = password_hash($username, PASSWORD_BCRYPT, $options);

        echo "<br> HASHING GIKK GREIT";

        if ($hashedPass && $hashedUser) {
            $uname = $this->db->quote($hashedUser);
            $pass = $this->db->quote($hashedPass);

            try {
                $sql = "INSERT INTO brukere (id, brukernavn, passord) VALUES(0,$uname,$pass)";
                $result = $this->db->query($sql);

                if (!$result) throw new mysqli_sql_exception("Feil ved innsetting av person");
                else return $result;

            } catch (mysqli_sql_exception $error) {
                echo $error;
            }
        } else throw new mysqli_sql_exception("Passord eller brukernavn kunne ikke registreres");
    }

    function verifyUser($username, $password)
    {
        $uname = $this->db->quote($username);
        $pass = $this->db->quote($password);

        try{
            $sql = "SELECT * FROM brukere";
            $result = $this->db->query($sql);

            if (!$result) throw new mysqli_sql_exception("Feil i bekreftelse av bruker");
            else {

                while ($rad = mysqli_fetch_array($result)){

                    echo "<br> Sammenligner| hasha brukernavn: ".$rad["brukernavn"]."<br> unhasha brukernavn: $uname";
                    echo "<br> Sammenligner| hasha passord: ".$rad["passord"]."<br> unhasha passord: $uname<br>";

                    $userOK = password_verify($uname, $rad["brukernavn"]);
                    $passOK = password_verify($pass, $rad["passord"]);
                    echo $passOK ."WHY WONT YOU PRINT OUT<". $userOK;

                    if ($userOK && $passOK) {
                        echo "<br> verified yo <br>";
                        return true;
                    }
                }
                echo "<br> not verified no<br>";
                return false;
            }
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }
    }

    function deleteUser($_id)
    {
        $id = $this->db->quote($_id);
        try {
            $sql = "DELETE FROM brukere WHERE id = $id";
            $result = $this->db->query($sql);

            if (!$result) throw new mysqli_sql_exception("Feil ved sletting av person");
            else return $result;
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }
    }
}