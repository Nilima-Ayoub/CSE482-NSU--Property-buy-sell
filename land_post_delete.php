<?php

session_start();
include_once 'connection.php';
$sql = "DELETE FROM land_post WHERE id='".$_GET['land_id']."'";
$user_id=$_GET['user_id'];

if (mysqli_query($mysqli_connection, $sql)) {
    
    if (isset($_SESSION['username']) && ($_SESSION['role'] == 'admin')) {

        //if admin deletes then total post update
        $aptPost = mysqli_query(
            $mysqli_connection,
            "SELECT * FROM apt_info where user_id='$user_id'");
            $aptRowCount = mysqli_num_rows($aptPost);
    
    
    $landPost = mysqli_query(
            $mysqli_connection,
            "SELECT * FROM land_post where user_id='$user_id'");
            $landRowCount = mysqli_num_rows($landPost);
    
            $totalPost=0;
    $totalPost=$landRowCount + $aptRowCount;
      $query3 = "UPDATE user_info SET totalPost='$totalPost' WHERE id='$user_id'";
      $profile_edit = mysqli_query($mysqli_connection, $query3);
        
      header('location:admin_dashboard.php');
    }
     else {
        include_once 'product_query.php';
        header('location:sellerView.php');
    }
} else {
    echo 'Error deleting record: '.mysqli_error($mysqli_connection);
}