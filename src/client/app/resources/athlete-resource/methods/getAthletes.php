<?php
/**
 * Created by PhpStorm.
 * User: Duy
 * Date: 13/05/2017
 * Time: 13:42
 */

require_once __DIR__ . '/../athleteservice.php';
$athleteService = new AthleteService();

try {
    $result = $athleteService->getDistinctAthletes();

    echo json_encode($result);
} catch (mysqli_sql_exception $error) {
    echo $error;
}
