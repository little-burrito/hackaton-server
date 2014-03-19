<?php 
include('dbinfo.php');

$facebook_id = $_POST[ 'userid' ];
$name = $_POST[ 'username' ];
$profile_picture = $_POST[ 'profilepic' ]; 

echo "Userid: $facebook_id, name: $name, profile_picture: <img src=\"$profile_picture\" /><br />";

$mysqli = new mysqli( $db[ 'server' ], $db[ 'username' ], $db[ 'password'], $db[ 'database' ] );
if ( $mysqli->connect_errno ) {
	echo "Failed to connect to MySQL";
} else {
	$result = $mysqli->query( 'SELECT id FROM user WHERE facebook_id="'.$facebook_id.'" LIMIT 1;' );
	if ( mysqli_num_rows( $result )) {
		$result = $mysqli->query( 'UPDATE user SET name = "'.$name.'", profile_picture = "'.$profile_picture.'" WHERE facebook_id = '.$facebook_id.' LIMIT 1;' );
	} else {
		$result = $mysqli->query( 'INSERT INTO user ( facebook_id, name, profile_picture ) VALUES ( ' . $facebook_id . ', "' . $name . '", "' . $profile_picture . '" );' );
		if ( mysqli_num_rows( $result )) {
			echo "<pre>"; print_r($result); echo "</pre>";
		} else {
			echo "<pre>Looking good chicken!</pre>";
		}
	}
}

echo "<br />".$mysqli->error;
