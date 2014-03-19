<?php
include('dbinfo.php');

$json = "{ \"users\": [";
$mysqli = new mysqli( $db[ 'server' ], $db[ 'username' ], $db[ 'password'], $db[ 'database' ] );
if ( $mysqli->connect_errno ) {
	echo "Failed to connect to MySQL";
} else {
	$result = $mysqli->query( 'SELECT id, longitude, latitude, name FROM user;' );
	if ( mysqli_num_rows( $result )) {
		while ( $row = $result->fetch_assoc() ) {
			$json .= "{ \"name\": \"{$row['name']}\", \"latitude\": {$row['latitude']}, \"longitude\": {$row['longitude']}},";
		}
		$json = rtrim( $json, "," );
	}
}
$json .= "], ";
$json .= "\"error\": {$mysqli->error}\"\" ";
$json .= "}";
echo $json;
