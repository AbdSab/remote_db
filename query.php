<?php

include_once "dao.php";
session_start();

//Check if authentified
if(!isset($_POST["token"])) die("Token Missing");
if(!isset($_SESSION["token"])) die("Not connected");

$current_token = $_POST["token"];
if($current_token != $_SESSION["token"]){
	die("Not authorized");
}

//Proceed
$username = $_SESSION["username"];
$password = $_SESSION["password"];
$database = $_SESSION["database"];

$query      = $_POST["query"];

$connection = new Dao("localhost", $username, $password, $database);


$result = $connection->query($query);

$arr = [];
if($result){
	if(is_bool($result)){
		echo "Success";
	}
	else{
		while($row = $result->fetch_assoc()) {
        		$arr[] = $row;
    		}
		echo json_encode($arr);
	}
}else{
	die("Error query : ".$connection->error);
}

