<?php
	/**
	 * Created by PhpStorm.
	 * User: hakon
	 * Date: 13.05.2017
	 * Time: 16.58
	 */
	require_once __DIR__ . '\..\resources\spectators-recources\spectatorservice.php';
	$spectatorService = new SpectatorService();
	if ( !isset( $_REQUEST[ 'event' ] ) ) {
		return;
	}
	$event = $_REQUEST[ 'event' ];
	$eventArray = $spectatorService->getSpectatorsForEvent( $event );
?>
<div class="container-fluid">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Navn</th>
            <th>Telefon</th>
            <th>Addresse</th>
        </tr>
        </thead>
        <tbody>

		<?php
			var_dump( $eventArray );
			for ( $i = 0; $i < count( $eventArray ); $i++ ) {
				echo "<tr><td>" . $eventArray[ $i ]->fornavn . " " . $eventArray[ $i ]->etternavn . "</td>";
				echo "<td>" . $eventArray[ $i ]->telefon . "</td>";
				echo "<td>" . $eventArray[ $i ]->adresse . ", " . $eventArray[ $i ]->postnummer . " " . $eventArray[ $i ]->poststed . "</td></tr>";
			}
		?>
        </tbody>
    </table>
</div>
