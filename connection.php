<?php
	$servername = "localhost";
    $host = 'localhost';
	$user = "root";
	$pass = "";
	$dbname="simple_login";
	$charset = 'utf8mb4';
	$dsn ="mysql:host=$host;dbname=$dbname;charset=$charset";

$conn= new mysqli("localhost",$user,$pass,$pass);
$pdo = new PDO($dsn ,$user ,$pass ,[]);
