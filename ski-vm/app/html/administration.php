<?php

	require_once '../resources/user-recources/userservice.php';
	session_start();

?>
<script>

    $('#registerButton').on('click', function () {
        console.log('jeg kjører');
        $.ajax({
            url: "app/resources/user-recources/methods/registerUser.php?username=" + $('#brukernavn').val() + '&password=' + $('#passord').val(),
            type: 'post',
            success: function (resultat) {
                alert(resultat);
            }
        });
    });
    $('#loginnButton').on('click', function () {
        console.log('jeg kjører');
        $.ajax({
            url: "app/html/login.php?username=" + $('#brukernavn').val() + '&password=' + $('#passord').val(),
            type: 'post',
            success: function (resultat) {
                if (resultat === 'app/html/events.php') {
                    console.log(resultat);
                    callPage(resultat)
                } else {
                    alert(resultat)
                }
            }
        });
    });
</script>

<div id="administration">
    <div class="ml-auto mr-auto col-3">
        <h2>Logg inn/Registrer bruker</h2>
<<<<<<< HEAD
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
        <button id="registerButton" type="submit" class="btn btn-default" onchange="validateUser()">Registrer
        </button>
    </div>
</div>
=======
        <form method="get">
            <div class="form-group" id="brukernavnform">
                <label for="brukernavn">Brukernavn:</label>
                <input class="form-control" id="brukernavn" onchange="usernameValidation()">
            </div>
            <div class="form-group" id="passordform">
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
>>>>>>> d23c8b73daa693b6bcb961dcf2b5f6ab53297aad
