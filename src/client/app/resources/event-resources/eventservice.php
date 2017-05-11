<?php

require_once __DIR__ . '\..\..\shared\database\database.php';
require_once __DIR__ . '\..\..\shared\models\Ovelse.php';

class EventService
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

    function addEvent($navn)
    {
        $param = $this->db->quote($navn);
        try {
            $this->db->query("INSERT INTO `ovelse` (navn) VALUES $param");
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }
    }

    function getEvents()
    {
        try {
            $eventModels = array();
            $events = $this->db->select("SELECT * FROM `ovelse`");
            for ($i = 0; $i < count($events); $i++) {
                $rad = mysqli_fetch_array($events);
                $readEvent = new Event($rad["id"], $rad["navn"], $rad["verdensrekord"], $rad["rekordholder"]);
                array_push($eventModels, $readEvent);
            }

            return $eventModels;
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }
    }


    function updateEvent($id, $navn, $rekordholder, $rekordtid)
    {
        $_id = $this->db->quote($id);
        $name = $this->db->quote($navn);
        $holder = $this->db->quote($rekordholder);
        $tid = $this->db->quote($rekordtid);
        $this->db->query("UPDATE `ovelse` SET `navn` = $name, `rekordholder` = $holder, `verdensrekord` = $tid WHERE `id` = $_id");
    }

    function deleteEvent($id)
    {
        $_id = $id;
        $this->db->query("DELETE FROM `ovelse` WHERE `id` = $_id");
    }


    function insertWorldRecord($rekordholder, $rekordtid)
    {
        $person = $this->db->quote($rekordholder);
        $tid = $this->db->quote($rekordtid);
        try {
            $this->db->query("INSERT INTO `ovelse` (rekordholder, verdensrekord) VALUES ($person, $tid)");
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }
    }

    function setWorldRecord($id, $rekordholder, $rekordtid)
    {
        $_id = $this->db->quote($id);
        $person = $this->db->quote($rekordholder);
        $tid = $this->db->quote($rekordtid);
        try {
            $this->db->query("UPDATE `ovelse` SET rekordholder = $person, verdensrekord = $tid WHERE `id` = $_id");
        } catch (mysqli_sql_exception $error) {
            echo $error;
        }
    }


}
