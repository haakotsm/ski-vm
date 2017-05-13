<?php
/**
 * Created by PhpStorm.
 * User: hakon
 * Date: 11.05.2017
 * Time: 20.45
 */
require_once __DIR__ . '/../eventservice.php';
$eventService = new EventService();
$name = $_REQUEST['name'];
$record = $_REQUEST['record'];
$recordHolder = $_REQUEST['recordHolder'];

try {
    if ($name != '' && $name != 'undefined' && !empty($name) &&
        $record != '' && $record != 'undefined' && !empty($record) &&
        $recordHolder != '' && $recordHolder != 'undefined' && !empty($recordHolder)
    ) {
        echo $eventService->addEvent($name, $record, $recordHolder);

    }
} catch (mysqli_sql_exception $error) {
    echo $error;
}