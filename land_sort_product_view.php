<?php
include_once 'sortnavbar.php'; 
?>

<!--property view-->
<div class="container" id="productcard">
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4" >

<!--admin manage properties-->
<?php if (isset($_SESSION['username']) && ($_SESSION['role'] == 'admin')) {
             ?>

                <?php

          if ($land_product) {
              $rowcount = mysqli_num_rows($land_product);
              for ($i = 0; $i < $rowcount; ++$i) {
                  $row = mysqli_fetch_array($land_product); ?>
         
                  <div class="col">
                    <div class="card">
                      <img src="img/<?php echo $row['img']; ?>" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $row['Title']; ?></h5>
                        <p class="card-text">Type: <?php echo $row['Land_Type']; ?></p>
                        <p class="card-text">Place: <?php echo $row['Place']; ?></p>
                        <p class="card-text">Size: <?php echo $row['Land_Size']; ?>Katha</p>
                        <p class="card-text">Price:<?php echo $row['Price']; ?>Tk</p>
                        <p class="card-text">Contact info:<?php echo $row['Contact_info']; ?></p>
                        <a href="land_post_delete.php?land_id=<?php echo $row['id']; ?>&amp;user_id=<?php echo $row['user_id']; ?>" onclick='return checkdelete()' class="btn btn-outline-danger text-black">❌Delete</a>   
                  </div>
                  </div>
                  </div>
                <?php
              }
          } ?>
          </div>
                
  <?php
         } else {
             //seller/buyer view
             if ($land_product) {
                 $rowcount = mysqli_num_rows($land_product);
                 for ($i = 0; $i < $rowcount; ++$i) {
                     $row = mysqli_fetch_array($land_product); ?>
       
                <div class="col">
                  <div class="card">
                    <img src="img/<?php echo $row['img']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row['Title']; ?></h5>
                      <p class="card-text">Type: <?php echo $row['Land_Type']; ?></p>
                      <p class="card-text">Place: <?php echo $row['Place']; ?></p>
                      <p class="card-text">Size: <?php echo $row['Land_Size']; ?>Katha</p>
                      <p class="card-text">Price: <?php echo $row['Price']; ?>Tk</p>
                      <p class="card-text">Contact: <?php echo $row['Contact_info']; ?></p>
                      <a href="land_map.php?land_id=<?php echo $row['id']; ?>" target="_blank" class="btn btn-outline-info text-black">see map</a>   
                    </div>
                </div>
                </div>
              
                <?php
                 }
             }
         }?>
</div></div>
