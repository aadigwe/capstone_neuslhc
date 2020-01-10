<?php
// Connect to the database
DEFINE ('DB_USER', 'ada123');
DEFINE ('DB_PASSWORD', 'ada123');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'northeasternslhc');
$dbcon = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die
('Could not connect to MySQL: ' . mysqli_connect_error() );
mysqli_set_charset($dbcon, 'utf8');
?>


