<?php
	require_once 'vendor\autoload.php';
	require_once 'config\config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,  shrink-to-fit=no">
    <title>VM i ski</title>
    <script src="vendor/components/jquery/jquery.min.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <script src="app/scripts/spa-script.js"></script>
    <script type="text/javascript" src="app/scripts/RegExValidation.js"></script>
    <script>
        $(document).ready(function () {
            callPage('app/html/events.php');
        })
    </script>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-light p-0 flex-column mb-5">
    <div class="flex-row col-12 bg-primary">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-brand col-3 p-0" href="#">
            <img src="assets/banner_logo.png" width="100%" alt="">
        </div>
    </div>
    <div class="flex-row col-12 p-0">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto mr-5 text-white">
                <li class="nav-item mx-2">
                    <a class="nav-link" id="events" href="app/html/events.php"> Øvelsers <span
                                class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="app/html/athletes.html    "> Deltagere </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="app/html/registration.php"> Meld på øvelse </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="app/html/administration.php"> Logg Inn (Admin) </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="main-view">
</div>
</body>
</html>