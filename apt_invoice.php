<?php
include_once 'header.php'; ?>
<div class="container d-flex">
<div class="card mx-auto invoice_card">
    <div class="text-center mb-2">
    <h2>Thank you for using our website</h2>
<h5>Property Buy And Sell</h5>
    </div>
    <?php
     $query1 = mysqli_query(
      $mysqli_connection, "SELECT * FROM apt_info WHERE id='".$_GET['apt_id']."'"
      );

    $row = mysqli_fetch_array($query1);
  ?>
  
<div class="invoice text-center">
<p class="mb-4">INVOICE FOR #Apartment_(id):<?php echo $row['id']; ?>
<p>Name:<?php echo $_SESSION['username']; ?></p>
<p>Date & time:<?php echo $row['date']; ?></p>
<div class="invoice-items">
<p class="text-center fw-bold">Amount: 1000 TK</p>
<div class="d-flex justify-content-center">
  <a href="sellerView.php"  class="btn btn-outline-success pay" name="invoice_proceed">OK</a>
  
</div>
</div>
</div></div></div>