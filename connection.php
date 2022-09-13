<?php

$dbhost='localhost';
$dbuser = 'root';
$dbpass= '';
$dbname= 'rei';

$con= mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

if (!$con){
    die('failed to connect');
}



