<?php

session_start();

if(!isset($_POST["token"])) die("Token missing");
if(!isset($_SESSION["token"])) die("Not connected");

if ($_POST["token"] != $_SESSION["token"]){
	die("Not Authorized !");
}

session_unset();
session_destroy();
