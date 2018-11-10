<?php
define('HOST','localhost');
define('USER', '*******');
define('PASS', '*******');
define('DBNAME', '******');

$mysqli = new mysqli(HOST, USER,PASS,DBNAME) or die ('Error connecting.');

if ($mysqli->errno) {
    echo 'Connection error: ' . $mysqli->errno;
}
