<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "test001";
$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$con)
{

	die("failed to connect!");
}
