<?php

	require_once '../resources/user-recources/userservice.php';
	session_start();

?>

<div id="administration">

    <div class="ml-auto mr-auto col-3">

        <h2>Logg inn/Registrer bruker</h2>
        <form method="get">
            <div class="form-group">
                <label for="brukernavn">Brukernavn:</label>
                <input class="form-control" id="brukernavn" onchange="usernameValidation()">
            </div>
            <div class="form-group">
                <label for="pwd">Passord:</label>
                <input type="password" class="form-control" id="passord" onchange="passwordValidation()">
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            <button id="loginnButton" type="submit" class="btn btn-default" onchange="validateUser()">Logg inn</button>
            <button id=registerButton" type="submit" class="btn btn-default" onchange="validateUser()">Registrer
            </button>
        </form>

		<?php


			$userserivice = new userservice();

			if ( isset( $_GET[ 'loginnButton' ] ) ) {
				if ( $userserivice->verifyUser( $_GET[ 'brukernavn' ], $_GET[ 'passord' ] ) ) {
					$_SESSION[ 'brukernavn' ] = $_GET[ 'brukernavn' ];
				}
			}

			if ( isset( $_GET[ 'registerButton' ] ) ) {
				$userserivice->addUser( $_GET[ 'brukernavn' ], $_GET[ 'passord' ] );
				$_SESSION[ 'brukernavn' ] = $_GET[ 'brukernavn' ];
			}
		?>

    </div>