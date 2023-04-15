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
if ($apt_product) {
                 $rowcount = mysqli_num_rows($apt_product);
                 for ($i = 0; $i < $rowcount; ++$i) {
                     $row = mysqli_fetch_array($apt_product); ?>

                  <div class="col">
                    <div class="card">
                      <img src="../project/img/<?php echo $row['img']; ?>" class="card-img-top" alt="...">
                      <div class="card-body">
                      <input type="hidden" id="land_id" name="land_id" value="<?php echo $row['id']; ?>">
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>
                        <p class="card-text">Place: <?php echo $row['place']; ?></p>
                        <p class="card-text">Size: <?php echo $row['size']; ?>Katha</p>
                        <p class="card-text">Bedrooms: <?php echo $row['bedrooms']; ?></p>
                        <p class="card-text">Bathrooms: <?php echo $row['bathrooms']; ?></p>
                        <p class="card-text">Price: <?php echo $row['price']; ?>Tk</p>
                        <p class="card-text">Contact info:<?php echo $row['contact_info']; ?></p>
                        <a href="apt_post_delete.php?apt_id=<?php echo $row['id']; ?>&amp;user_id=<?php echo $row['user_id']; ?>" onclick='return checkdelete()' class="btn btn-outline-danger text-black" >❌Delete</a>
                      </div>
                  </div>
                  </div>
                  <?php
                 }
             }
         } else {
             //seller/buyer view
             if ($apt_product) {
                 $rowcount = mysqli_num_rows($apt_product);
                 for ($i = 0; $i < $rowcount; ++$i) {
                     $row = mysqli_fetch_array($apt_product); ?>
                <div class="col">
                  <div class="card">
                    <img src="../project/img/<?php echo $row['img']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row['title']; ?></h5>
                      <p class="card-text">Place: <?php echo $row['place']; ?></p>
                      <p class="card-text">Size: <?php echo $row['size']; ?>Katha</p>
                      <p class="card-text">Bedrooms: <?php echo $row['bedrooms']; ?></p>
                      <p class="card-text">Bathrooms: <?php echo $row['bathrooms']; ?></p>
                      <p class="card-text">Price: <?php echo $row['price']; ?>Tk</p>
                      <p class="card-text">Contact info:<?php echo $row['contact_info']; ?></p>
                      <a href="apt_map.php?apt_id=<?php echo $row['id']; ?>" target="_blank" class="btn btn-outline-info text-black">see map</a>   
                    </div>
                </div>
                </div>
                <?php
                 }
             }
         }?>
</div></div>
