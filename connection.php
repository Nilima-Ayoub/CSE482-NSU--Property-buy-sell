<?php

$mysqli_connection = new MySQLi('localhost', 'root', '', '482_project');

if ($mysqli_connection->connect_error) {
    echo 'Not connected, error: '.$mysqli_connection->connect_error;
} else {
    echo '';
}
?>