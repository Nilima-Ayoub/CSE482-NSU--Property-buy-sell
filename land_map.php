<!DOCTYPE html>
<html>
  <head>
    <title>Map</title>
    <?php include_once('header.php');
    ?>
  </head>
  <body>

    <?php 
 $land_location = mysqli_query(
  $mysqli_connection,
  "SELECT * FROM land_post where id='".$_GET['land_id']."'");
  $landRowCount = mysqli_num_rows($land_location);
  $row = mysqli_fetch_array($land_location); ?>

<div class="container justify-content-center">
<div class="row row-cols-1 row-cols-md-2" > 
<div class="col"> 
<div class="map m-2">
<?php 
        $address =$row['Place'];
        $address = str_replace(" ", "+", $address);
        ?> 
        <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>
    </div></div>
    <div class="col"> 
    <div class="card map-card">
                       <img src="../project/img/<?php echo $row['img']; ?>" class="card-img-top" alt="...">
                       <div class="card-body">
                        <h5 class="card-title"><?php echo $row['Title']; ?></h5>
                        <p class="card-text">Type: <?php echo $row['Land_Type']; ?></p>
                        <p class="card-text">Place: <?php echo $row['Place']; ?></p>
                        <p class="card-text">Size: <?php echo $row['Land_Size']; ?>Katha</p>
                        <p class="card-text">Price:<?php echo $row['Price']; ?>Tk</p>
                        <p class="card-text">Contact info:<?php echo $row['Contact_info']; ?></p>
                  </div>
                </div></div>
    </div>
    </div>
  </body>
</html>