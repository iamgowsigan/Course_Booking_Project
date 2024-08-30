<?php

$HostName = "localhost";
$HostUser = "root";
$HostPass = "";
$DatabaseName = "erdifny";
$AppKey="3#252*mech";

//header('Content-Type: application/json');



$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
error_reporting(0);
?>