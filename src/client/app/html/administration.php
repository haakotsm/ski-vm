<div id="administration">

<div class="ml-auto mr-auto col-3">

    <h2>Logg inn/Registrer bruker</h2>
    <form>
        <div class="form-group">
            <label for="email">Brukernavn:</label>
            <input type="email" class="form-control" id="brukernavn" onchange="usernameValidation()">
        </div>
        <div class="form-group">
            <label for="pwd">Passord:</label>
            <input type="password" class="form-control" id="passord" onchange="passwordValidation()">
        </div>
        <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
        </div>
        <button id="loginnButton" type="submit" class="btn btn-default" onchange="validateUser()">Logg inn</button>
        <button type="submit" class="btn btn-default" onchange="validateUser()">Registrer</button>
    </form>

<?php

session_start();

$_SESSION['brukernavn'] = 'brukernavn';
$_SESSION['passord'] = 'passord';

?>

</div>