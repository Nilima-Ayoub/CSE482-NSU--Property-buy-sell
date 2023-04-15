<?php
session_start();
include_once 'connection.php';

$user_id = $_SESSION['id'];
//Apartment post
if (isset($_POST['apt_payment_submit'])) {
    $apt_title = $_POST['apt_titlename'];
    $apt_place = $_POST['apt_place'];
    $apt_sqft = $_POST['apt_sqft'];
    $apt_bedrooms = $_POST['apt_bedrooms'];
    $apt_bathrooms = $_POST['apt_bathrooms'];
    $apt_price = $_POST['apt_price'];
    $apt_contact = $_POST['apt_contact'];
    $apt_img = $_POST['apt_img'];
    $user_name = $_SESSION['username'];

    $query =
          "INSERT INTO apt_info
    values(default,'$user_id','$apt_title','$apt_place','$apt_sqft','$apt_bedrooms','$apt_bathrooms','$apt_price','$apt_contact','$apt_img',NOW())";

    header('location:sellerView.php');

    $apt_post = mysqli_query($mysqli_connection, $query);
}

//Apartment edit
if (isset($_POST['apt_edit'])) {
    $apt_title = $_POST['apt_titlename'];
    $apt_place = $_POST['apt_place'];
    $apt_sqft = $_POST['apt_sqft'];
    $apt_bedrooms = $_POST['apt_bedrooms'];
    $apt_bathrooms = $_POST['apt_bathrooms'];
    $apt_price = $_POST['apt_price'];
    $apt_contact = $_POST['apt_contact'];
    $apt_img = $_POST['apt_img'];
    $apt_id = $_POST['apt_id'];

    if ($apt_img != null) {
        $query = "UPDATE apt_info SET title='$apt_title', place='$apt_place', size='$apt_sqft', bedrooms='$apt_bedrooms', bathrooms='$apt_bathrooms', price='$apt_price', contact_info='$apt_contact', img='$apt_img' WHERE id='$apt_id'";
        $apt_edit = mysqli_query($mysqli_connection, $query);
        if ($apt_edit) {
            header('location:sellerView.php');
        } else {
            echo 'Error updating record: '.mysqli_error($mysqli_connection);
        }
    } else {
        $query = "UPDATE apt_info SET title='$apt_title', place='$apt_place', size='$apt_sqft', bedrooms='$apt_bedrooms', bathrooms='$apt_bathrooms', price='$apt_price', contact_info='$apt_contact' WHERE id='$apt_id'";
        $apt_edit = mysqli_query($mysqli_connection, $query);
        if ($apt_edit) {
            header('location:sellerView.php');
        } else {
            echo 'Error updating record: '.mysqli_error($mysqli_connection);
        }
    }
}

//Land post
if (isset($_POST['land_details'])) {
    $title = $_POST['land_title'];
    $land_type = $_POST['land_type'];
    $land_place = $_POST['land_place'];
    $land_size = $_POST['land_sqft'];
    $land_price = $_POST['land_price'];
    $land_contact = $_POST['land_contact'];
    $img = $_POST['land_img'];
    $user_name = $_SESSION['username'];

    $query =
          "INSERT INTO land_post
    values(default,'$user_id','$title','$land_type','$land_place','$land_size','$land_price','$land_contact','$img',NOW())";
    $land_post = mysqli_query($mysqli_connection, $query);
    header('location:sellerView.php');
}

//Land edit
if (isset($_POST['land_edit'])) {
    $land_title = $_POST['land_title'];
    $land_type = $_POST['land_type'];
    $land_place = $_POST['land_place'];
    $land_size = $_POST['land_sqft'];
    $land_price = $_POST['land_price'];
    $land_contact = $_POST['land_contact'];
    $land_img = $_POST['land_img'];
    $land_id = $_POST['land_id'];

    if ($land_img != null) {
        $query = "UPDATE land_post SET Title='$land_title', Land_Type='$land_type', Place='$land_place', Land_Size='$land_size', Price='$land_price', Contact_info='$land_contact', img='$land_img'  WHERE id='$land_id'";
        $land_edit = mysqli_query($mysqli_connection, $query);
        if ($land_edit) {
            header('location:sellerView.php');
        } else {
            echo 'Error updating record: '.mysqli_error($mysqli_connection);
        }
    } else {
        $query = "UPDATE land_post SET Title='$land_title', Land_Type='$land_type', Place='$land_place', Land_Size='$land_size', Price='$land_price', Contact_info='$land_contact'  WHERE id='$land_id'";
        $land_edit = mysqli_query($mysqli_connection, $query);
        if ($land_edit) {
            header('location:sellerView.php');
        } else {
            echo 'Error updating record: '.mysqli_error($mysqli_connection);
        }
    }
}

//totalPostUpdate

//if user posts and deletes then total post update
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
?>


