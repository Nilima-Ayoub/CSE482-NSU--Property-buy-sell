<?php
include_once('header.php');
include_once('profile_edit_modal.php');
if (isset($_SESSION['username']) && ($_SESSION['role'] == 'admin')) {
?>

<div class="container" id="admin_dashboard_card">
<h1 class="text-center mb-3 text-success" >Admin Panel ⚙️</h1>
<div class="d-grid gap-2 col-3 mx-auto mb-3">
  <button class="btn btn-outline-info" type="button" data-bs-toggle="modal" data-bs-target="#edit_profile">Edit information</button>
</div>
              <div class="row row-cols-1 row-cols-md-2 g-4 mt-4" >
                <div class="col">
                  <div class="card ">
                    <img src="../project/img/properties.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      
                      <a href="buyerview.php" class="btn btn-outline-success card text-center text-dark" type="button">Manage Properties</a>

                    </div>
                  </div>
                </div>
                <div class="col">
                <div class="card">
                    <img src="../project/img/users.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      
                      <a href="manage_seller.php" class="btn btn-success card text-center text-dark" type="button">Manage Sellers</a>

                    </div>
                  </div>
                </div>
            </div>

            
            
            <?php include_once("../project/footer.php");
}

else
  echo '<script type="text/javascript"> window.location="main.php";</script>';

?>
        