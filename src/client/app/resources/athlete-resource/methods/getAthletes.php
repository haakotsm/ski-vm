<?php
	/**
	 * Created by PhpStorm.
	 * User: Duy
	 * Date: 13/05/2017
	 * Time: 13:42
	 */

	require_once __DIR__ . '/../athleteservice.php';
	session_start();
	$athleteService = new AthleteService();
try {
	$result = $athleteService->getDistinctAthletes();
	$returnString = "";
	for ( $i = 0; $i < count( $result ); $i++ ) {
		$id = $result[ $i ]->id;
		$returnString .= '<tr id="row' . $i . '">' .
			'<th scope="row">' . $id . '</th>' .
			'<td>' . $result[ $i ]->fornavn . '</td>' .
			'<td>' . $result[ $i ]->etternavn . '</td>';
		if ( isset( $_SESSION[ 'brukernavn' ] ) ) {
		$returnString .= "<td><button class='btn btn-outline-danger' oninput='delete($id)'>Slett</button>";
		$returnString .= "<td><button class='btn btn-outline-info' oninput='edit($id)'>Endre</button>";
		}
		$returnString .= '</tr>';
	};
	echo $returnString;
	//echo json_encode($result);
} catch (mysqli_sql_exception $error) {
	echo $error;
}
