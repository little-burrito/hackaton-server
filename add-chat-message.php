<?php
include("dbinfo.php");

$userid = intval($_GET["userid"]);
$circleid = intval($_GET["circleid"]);
$message = $_GET["message"];

$mysqli = new mysqli( $db[ 'server' ], $db[ 'username' ], $db[ 'password' ], $db[ 'database' ] );

$result = $mysqli->query("INSERT INTO circle_chat (circle_id, user_id, message) VALUES ('$circleid', '$userid', '$message')");

echo "INSERT INTO circle_chat ('circle_id', 'user_id', 'message') VALUES ('$circleid', '$userid', '$message')";