<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

file_put_contents( 'info_get.txt', print_r($_GET, true) );
file_put_contents( 'info.txt', print_r($_POST, true) );

echo "hurra";

