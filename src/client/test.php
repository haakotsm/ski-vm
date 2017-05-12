<?php
/**
 * Created by PhpStorm.
 * User: Duy
 * Date: 12/05/2017
 * Time: 12:32
 */

include 'app/resources/user-recources/userservice.php';

$options = [
    'cost' => 11
];

$us = new UserService();
echo "NÅ TESTER VI <br>";
echo $us->addUser(1, "admin", "admin");