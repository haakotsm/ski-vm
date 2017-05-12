<?php
/**
 * Created by PhpStorm.
 * User: Duy
 * Date: 12/05/2017
 * Time: 12:32
 */

include 'app/resources/user-recources/userservice.php';
include 'app/resources/spectators-recources/spectatorservice.php';

$us = new UserService();
$us->addUser("accenture","pass");
$us->verifyUser("accenture","pass");


