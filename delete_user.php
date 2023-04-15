<?php

include_once 'connection.php';
$sql = "DELETE FROM user_info WHERE id='".$_GET['id']."'";

if (mysqli_query($mysqli_connection, $sql)) {
    $sql2= "DELETE FROM apt_info WHERE user_id='".$_GET['id']."'";
    (mysqli_query($mysqli_connection, $sql2));
    $sql3= "DELETE FROM land_post WHERE user_id='".$_GET['id']."'";
    (mysqli_query($mysqli_connection, $sql3));
    header('Location:manage_seller.php');
} else {
    echo 'Error deleting record: '.mysqli_error($mysqli_connection);
}
