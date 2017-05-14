<script>
    $('#tilbake').on('click', function () {
        callPage($(this).attr('href'));
        return false;
    })
</script>
<?php
	/**
	 * Created by PhpStorm.
	 * User: hakon
	 * Date: 13.05.2017
	 * Time: 16.58
	 */
	require_once __DIR__ . '\\..\\resources\\spectators-recources\\spectatorservice.php';
	$spectatorService = new SpectatorService();
	if ( !isset( $_REQUEST[ 'event' ] ) ) {
		return;
	}
	$event = $_REQUEST[ 'event' ];
	$eventArray = $spectatorService->getSpectatorsForEvent( $event );
?>
<div class="container-fluid">
    <div class="p-3">
        <div class="offset-10">
            <a id="tilbake" href="app/html/events.php">Tilbake</a>
        </div>
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
				for ( $i = 0; $i < count( $eventArray ); $i++ ) {
					echo "<tr><td>" . $eventArray[ $i ]->fornavn . " " . $eventArray[ $i ]->etternavn . "</td>";
					echo "<td>" . $eventArray[ $i ]->telefon . "</td>";
					echo "<td>" . $eventArray[ $i ]->adresse . ", " . $eventArray[ $i ]->postnummer . " " . $eventArray[ $i ]->poststed . "</td></tr>";
				}
			?>
            </tbody>
        </table>
    </div>
</div>
