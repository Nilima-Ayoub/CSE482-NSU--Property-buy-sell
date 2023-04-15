<?php
include_once 'header.php'; ?>

<?php
if (isset($_POST['search'])) {
    $category = $_POST['category'];
    $pid = $_POST['price'];
    $ap_id = $_POST['apt_option'];
    $lp_id = $_POST['land_option']; 
    ?>


<?php
if ($category == 'Please-select-a-Category' && empty($ap_id) && empty($lp_id) && $pid == 'Please-select-a-range') {
        include_once 'buyerview.php';
    } elseif ($category == 'Apartment' && empty($ap_id) && empty($lp_id) && $pid == 'Low-high') {
        $sql2 = 'SELECT *FROM apt_info  order by price asc';
        $apt_product = mysqli_query($mysqli_connection, $sql2);
        include_once 'apt_sort_product_view.php';
    } elseif ($category == 'Apartment' && empty($ap_id) && empty($lp_id) && $pid == 'High-low') {
        $sql2 = 'SELECT *FROM apt_info  order by price desc';
        $apt_product = mysqli_query($mysqli_connection, $sql2);
        include_once 'apt_sort_product_view.php';
    } elseif ($category == 'Land' && empty($ap_id) && empty($lp_id) && $pid == 'Low-high') {
        $sql = 'SELECT *FROM land_post  order by Price asc';

        $land_product = mysqli_query($mysqli_connection, $sql);
        include_once 'land_sort_product_view.php';
    } elseif ($category == 'Land' && empty($ap_id) && empty($lp_id) && $pid == 'High-low') {
        $sql = 'SELECT *FROM land_post  order by Price desc';

        $land_product = mysqli_query($mysqli_connection, $sql);
        include_once 'land_sort_product_view.php';
    } elseif ($category == 'Apartment' && empty($ap_id) && empty($lp_id) && $pid == 'Please-select-a-range') {
        $sql2 = 'SELECT *FROM apt_info  order by price asc';
        $apt_product = mysqli_query($mysqli_connection, $sql2);
        include_once 'apt_sort_product_view.php';
    } elseif ($category == 'Land' && empty($ap_id) && empty($lp_id) && $pid == 'Please-select-a-range') {
        $sql = 'SELECT *FROM land_post';
        $land_product = mysqli_query($mysqli_connection, $sql);
        include_once 'land_sort_product_view.php';
    } elseif ($category == 'Please-select-a-Category' && $pid == 'Low-high' && empty($ap_id) && empty($lp_id)) {
        $sql2 = 'SELECT *FROM apt_info order by price asc';
        $apt_product = mysqli_query($mysqli_connection, $sql2);
        $sql = 'SELECT *FROM land_post order by Price asc';
        $land_product = mysqli_query($mysqli_connection, $sql);
        include_once 'land_apt_sort.php';
    } elseif ($category == 'Please-select-a-Category' && $pid == 'High-low' && empty($ap_id) && empty($lp_id)) {
        $sql2 = 'SELECT *FROM apt_info order by price desc';
        $apt_product = mysqli_query($mysqli_connection, $sql2);
        $sql = 'SELECT *FROM land_post order by Price desc';
        $land_product = mysqli_query($mysqli_connection, $sql);
        include_once 'land_apt_sort.php';
    } elseif (($category == 'Please-select-a-Category' || $category == 'Apartment') && isset($ap_id) && empty($lp_id) && $pid == 'Please-select-a-range') {
        $sql2 = "SELECT *FROM apt_info where place='$ap_id'";
        $apt_product = mysqli_query($mysqli_connection, $sql2);
        include_once 'apt_sort_product_view.php';
    } elseif (($category == 'Please-select-a-Category' || $category == 'Apartment') && isset($ap_id) && empty($lp_id) && $pid == 'Low-high') {
        $sql2 = "SELECT *FROM apt_info where place='$ap_id' order by price asc";
        $apt_product = mysqli_query($mysqli_connection, $sql2);
        include_once 'apt_sort_product_view.php';
    } elseif (($category == 'Please-select-a-Category' || $category == 'Apartment') && isset($ap_id) && empty($lp_id) && $pid == 'High-low') {
        $sql2 = "SELECT *FROM apt_info where place='$ap_id' order by price desc";
        $apt_product = mysqli_query($mysqli_connection, $sql2);
        include_once 'apt_sort_product_view.php';
    } elseif (($category == 'Please-select-a-Category' || $category == 'Land') && $pid == 'Please-select-a-range' && isset($lp_id) && empty($ap_id)) {
        $sql = "SELECT *FROM land_post where Place='$lp_id'";
        $land_product = mysqli_query($mysqli_connection, $sql);
        include_once 'land_sort_product_view.php';
    } elseif (($category == 'Please-select-a-Category' || $category == 'Land') && $pid == 'Low-high' && isset($lp_id) && empty($ap_id)) {
        $sql = "SELECT *FROM land_post where Place='$lp_id' order by Price asc";
        $land_product = mysqli_query($mysqli_connection, $sql);
        include_once 'land_sort_product_view.php';
    } elseif (($category == 'Please-select-a-Category' || $category == 'Land') && $pid == 'High-low' && isset($lp_id) && empty($ap_id)) {
        $sql = "SELECT *FROM land_post where Place='$lp_id' order by Price desc";
        $land_product = mysqli_query($mysqli_connection, $sql);
        include_once 'land_sort_product_view.php';
    } elseif (($category == 'Please-select-a-Category' || $category == 'Land') && $pid == 'Low-high' && isset($ap_id) && isset($lp_id)) {
        $sql = "SELECT *FROM land_post where Place='$lp_id' order by Price asc";

        $land_product = mysqli_query($mysqli_connection, $sql);
        include_once 'land_sort_product_view.php';
    } elseif (($category == 'Please-select-a-Category' || $category == 'Land') && $pid == 'High-low' && isset($ap_id) && isset($lp_id)) {
        $sql2 = "SELECT *FROM apt_info where place='$ap_id' order by price desc";

        $apt_product = mysqli_query($mysqli_connection, $sql2);
        $sql = "SELECT *FROM land_post where Place='$lp_id' order by Price desc";

        $land_product = mysqli_query($mysqli_connection, $sql);
        include_once 'land_apt_sort.php';
    } elseif ($pid == 'Please-select-a-range' && isset($ap_id) && isset($lp_id)) {
        $sql2 = "SELECT *FROM apt_info where place='$ap_id'";
        $sql = "SELECT *FROM land_post where Place='$lp_id'";

        $apt_product = mysqli_query($mysqli_connection, $sql2);

        $land_product = mysqli_query($mysqli_connection, $sql);
        include_once 'land_apt_sort.php';
    } elseif ($pid == 'High-low' && isset($ap_id) && isset($lp_id)) {
        $sql2 = "SELECT *FROM apt_info where place='$ap_id'order by price desc";
        $sql = "SELECT *FROM land_post where Place='$lp_id'order by Price desc";
        $apt_product = mysqli_query($mysqli_connection, $sql2);
        $land_product = mysqli_query($mysqli_connection, $sql);
        include_once 'land_apt_sort.php';
    } elseif ($pid == 'Low-high' && isset($ap_id) && isset($lp_id)) {
        $sql2 = "SELECT *FROM apt_info where place='$ap_id'order by price asc";
        $sql = "SELECT *FROM land_post where Place='$lp_id'order by Price asc";
        $apt_product = mysqli_query($mysqli_connection, $sql2);
        $land_product = mysqli_query($mysqli_connection, $sql);
        include_once 'land_apt_sort.php';
    } ?>

<?php
} else {
        include_once 'buyerview.php';
    }?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
      <script src="check_delete.js"></script>
      <script>
</script>


  <?php include_once '../project/footer.php'; ?>

