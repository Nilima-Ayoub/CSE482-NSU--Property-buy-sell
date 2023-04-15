<?php
session_start();
include_once('connection.php');

//registration
if (isset($_POST['registration'])) {
    $username = $_POST['reginame'];
    $email = $_POST['regiemail'];
    $password = $_POST['regipassword'];
    $phonenumber = $_POST['regiphonenumber'];

    $query =
        "INSERT INTO user_info
    values(default,'$username','user','$email','$password','$phonenumber',0)";
    $registration = mysqli_query($mysqli_connection, $query);
    header('location:../project/sellerView.php');
}

//Login
if (isset($_POST['login_submit'])) {
    $email = $_POST['loginemail'];
    $check = mysqli_query(
        $mysqli_connection,
        "SELECT * FROM user_info WHERE Email_address = '$email'"
    ) or die();

    //Gives error if user dosen't exist
    $check2 = mysqli_num_rows($check);
    if ($check2 == 0) {
        header('location: logIn.php?error=no user found');
    }
    else {
        while ($info = mysqli_fetch_array($check)) {
            //gives error if the password is wrong
            if ($_POST['loginpwd'] != $info['Password']) {
                // Redirect To login page
                header('location: logIn.php?error=Wrong Password');
            }
            else {
                $_SESSION['id'] = $info['id'];
                $_SESSION['username'] = $info['Name'];
                $_SESSION['role'] = $info['role'];

                if ($_SESSION['role'] == 'admin')
                    header('location: admin_dashboard.php');
                else if ($_SESSION['role'] == 'user')
                    header('location: sellerView.php');
                else
                    header('location: main.php');
            }
        }
    }
}

//Profile edit
if (isset($_POST['edit_profile'])) {
    $username = $_POST['reginame'];
    $email = $_POST['regiemail'];
    $password = $_POST['regipassword'];
    $phonenumber = $_POST['regiphonenumber'];
    $query = "UPDATE user_info SET Name='$username',Email_address='$email',Password='$password',phone_number='$phonenumber' WHERE id='" . $_SESSION['id'] . "'";
    $profile_edit = mysqli_query($mysqli_connection, $query);
    if ($profile_edit && $_SESSION['role'] == 'user') {
        header('location:sellerView.php');
    }
    
else if ($profile_edit && $_SESSION['role'] == 'admin') {
        header('location:admin_dashboard.php');
    }
    else {
        echo 'Error updating record: ' . mysqli_error($mysqli_connection);
    }
}
?>


