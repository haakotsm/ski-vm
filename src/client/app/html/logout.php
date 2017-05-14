<?php
	/**
	 * Created by PhpStorm.
	 * User: hakon
	 * Date: 14.05.2017
	 * Time: 22.03
	 */
	if(isset($_SESSION['brukernavn'])) {
		session_destroy();
	}
	header("Location: events.php");
	exit();