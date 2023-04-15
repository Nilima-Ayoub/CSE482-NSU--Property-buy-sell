<!DOCTYPE html>
<html>
  <head>
    <title>Map</title>
    <?php include_once('header.php');
    ?>
  </head>
  <body>

    <?php 
    $apt_location = mysqli_query(
      $mysqli_connection,
      "SELECT * FROM apt_info where id='".$_GET['apt_id']."'");
      $aptRowCount = mysqli_num_rows($apt_location);
        $row = mysqli_fetch_array($apt_location); ?>

<div class="container justify-content-center">
<div class="row row-cols-1 row-cols-md-2" > 
<div class="col"> 
<div class="map m-2">
<?php 
        $address =$row['place'];
        $address = str_replace(" ", "+", $address);
        ?> 
        <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>
    </div></div>
    <div class="col"> 
    <div class="card map-card">
                    <img src="../project/img/<?php echo $row['img']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                    <input type="hidden" id="land_id" name="land_id" value="<?php echo $row['id']; ?>">
                      <h5 class="card-title"><?php echo $row['title'];?></h5>
                      <p class="card-text">Place: <?php echo $row['place']; ?></p>
                      <p class="card-text">Size: <?php echo $row['size']; ?>Katha</p>
                      <p class="card-text">Bedrooms: <?php echo $row['bedrooms']; ?></p>
                      <p class="card-text">Bathrooms: <?php echo $row['bathrooms']; ?></p>
                      <p class="card-text">Price: <?php echo $row['price']; ?>Tk</p>
                      <p class="card-text">Contact info:<?php echo $row['contact_info']; ?></p>  
                    </div>
                </div></div>
    </div>
    </div>
  </body>
</html>