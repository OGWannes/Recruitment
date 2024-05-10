<?php

include_once 'conbase.php';


$email = $_GET['email'];

$req = "SELECT * FROM profile WHERE email = $email";


