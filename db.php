<?php

// Error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// MySQL connection
$db = new mysqli("localhost", "root", "", "form");

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>
