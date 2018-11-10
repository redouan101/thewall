<?php
define('HOST','localhost');
define('USER', '24830_db');
define('PASS', '24830db');
define('DBNAME', '24830_db');

$mysqli = new mysqli(HOST, USER,PASS,DBNAME) or die ('Error connecting.');

if ($mysqli->errno) {
    echo 'Connection error: ' . $mysqli->errno;
}