<?php

require_once  ('./Actions/Databases.php');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
}


