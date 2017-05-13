<?php
/**
 * Created by PhpStorm.
 * User: hakon
 * Date: 12.05.2017
 * Time: 14.36
 */

require_once __DIR__ . '/../personservice.php';

$personService = new PersonService();

$firstName = $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];

try {

    if ($fornavn != '' && $fornavn != 'undefined' && !empty($fornavn) &&
        $etternavn != '' && $etternavn != 'undefined' && !empty($etternavn)
    ) {
        echo $personService->registerAsAthlete($fornavn, $etternavn);

    } else {
        throw new mysqli_sql_exception("Feil ved innlegging av person");
    }
} catch (mysqli_sql_exception $error) {
    echo $error;
}