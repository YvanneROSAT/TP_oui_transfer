<?php

require_once  './Databases.php';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
}


var_dump($_POST);


