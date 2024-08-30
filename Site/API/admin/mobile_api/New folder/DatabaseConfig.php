<?php

$HostName = "localhost";
$HostUser = "root";
$HostPass = "";
$DatabaseName = "erdifny";
$AppKey="3#252*mech";

header('Content-Type: application/json');


$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
		header('Content-Type: application/json');
		header('Access-Control-Allow-Origin:*');
		header('Access-Control-Allow-Headers:Origin, Content-Type, Cookie, X-CSRF-TOKEN, Accept, Authorization, X-XSRF-TOKEN, Access-Control-Allow-Origin');
		
error_reporting(0);
?>