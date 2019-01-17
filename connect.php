<?php

include "token.php";

$dbhost   = "localhost";
$username = $_POST["username"];
$password = $_POST["password"];
$database = $_POST["database"];

//Check if credentials correct
$connection = new mysqli($dbhost, $username, $password, $database);
if($connection->connect_error){
	die("Connection failed : ".$connection->connect_error);
}
$connection->close();

//Start session
session_start();

$token = get_token();

$_SESSION["token"]      = $token;
$_SESSION["username"]   = $username;
$_SESSION["password"]   = $password;
$_SESSION["database"]   = $database;

echo $token;
