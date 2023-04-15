<?php
include_once 'header.php';?>
<script src="check_delete.js"></script>

<?php
if(isset($_SESSION['username'])&& ($_SESSION['role']=='admin')){?>

<div class="container" id="productcard">
                <?php
  $query1 = mysqli_query(
          $mysqli_connection,
          "SELECT * FROM apt_info where user_id='".$_GET['user_id']."'");
          $aptRowCount = mysqli_num_rows($query1);

  $query2 = mysqli_query(
            $mysqli_connection,
            "SELECT * FROM land_post where user_id='".$_GET['user_id']."'");
            $landRowCount = mysqli_num_rows($query2);
            
            if($aptRowCount==0 && $landRowCount==0){?>
            <h4 class="text-danger">🔍 No posts to show!</h4>
           <?php }

  else {
    ?>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4" >
    
         <?php  
         //for apt

         for ($i = 0; $i < $aptRowCount; ++$i) {
              $row = mysqli_fetch_array($query1); ?>
                  <div class="col">
                    <div class="card">
                      <img src="../project/img/<?php echo $row['img']; ?>" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $row['title'];?></h5>
                        <p class="card-text">Place: <?php echo $row['place']; ?></p>
                        <p class="card-text">Size: <?php echo $row['size']; ?>sqft</p>
                        <p class="card-text">Bedrooms: <?php echo $row['bedrooms']; ?></p>
                        <p class="card-text">Bathrooms: <?php echo $row['bathrooms']; ?></p>
                        <p class="card-text">Price: <?php echo $row['price']; ?>Tk</p>
                        <p class="card-text">Contact info:<?php echo $row['contact_info']; ?></p>         
                        <a href="apt_post_delete.php?apt_id=<?php echo $row['id']?>&amp;user_id=<?php echo $row['user_id'];?>" onclick='return checkdelete()' class="btn btn-outline-danger text-black" >❌Delete</a>
                      </div>
                  </div>
                  </div>
                  <?php
          }
  
          //for land
          for ($i = 0; $i < $landRowCount; ++$i) {
              $row = mysqli_fetch_array($query2); ?>
         
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
                        <a href="land_post_delete.php?land_id=<?php echo $row['id']?>&amp;user_id=<?php echo $row['user_id'];?>" onclick='return checkdelete()' class="btn btn-outline-danger text-black">❌Delete</a>
                      </div>
                  </div>
                  </div>
                
                <?php
          }}
          ?>
          </div>
          </div>

          
<?php include_once("../project/footer.php"); } 

     else  echo '<script type="text/javascript"> window.location="main.php";</script>';
     ?>

