<?php
include_once('header.php'); 

//Land Edit
$sql= "SELECT *FROM land_post WHERE id='".$_GET['land_id']."'";
$sql_run= mysqli_query($mysqli_connection,$sql);
if (mysqli_query($mysqli_connection, $sql)) {
    $row= mysqli_fetch_array($sql_run)
    ?>

    <div class="container d-felx ">
      <div class="card mb-3 mx-auto" id="aptEdit_card">
      <div class="card-body">
        <h3 class="card-title text-center mb-4 ">Edit details (Land)</h3>
      <form method="post" action="product_query.php">

<div class="form-outline mb-4 ">
  <label for="land_edit_title">Title: </label>
  <input class="form-control" required id="land_edit_title" name="land_title" value="<?php echo $row['Title'];?>">
</div>

<div class="form-outline mb-4 ">
<label for="land_edit_type">Land Type: </label>
    
     <?php if($row['Land_Type']=='agricultural'){ ?>
        <div class="form-check  form-check-inline">
             <input class="form-check-input" type="radio"  id="agricultural" name="land_type"  value="agricultural" checked>
             <label class="form-check-label" for="agricultural">
               Agricultural
             </label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio"  id="residential" name="land_type"  value="residential">
             <label class="form-check-label" for="residential">
               Residential
             </label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio"  id="commercial" name="land_type"  value="commercial">
             <label class="form-check-label" for="commercial">
               Commercial
             </label>
           </div>
       <?php  }?>

       <?php if($row['Land_Type']=='residential'){ ?>
        <div class="form-check  form-check-inline">
             <input class="form-check-input" type="radio"  id="agricultural" name="land_type"  value="agricultural" >
             <label class="form-check-label" for="agricultural">
               Agricultural
             </label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio"  id="residential" name="land_type"  value="residential" checked>
             <label class="form-check-label" for="residential">
               Residential
             </label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio"  id="commercial" name="land_type"  value="commercial">
             <label class="form-check-label" for="commercial">
               Commercial
             </label>
           </div>
       <?php  }?>

       <?php if($row['Land_Type']=='commercial'){ ?>
        <div class="form-check  form-check-inline">
             <input class="form-check-input" type="radio"  id="agricultural" name="land_type" value="agricultural" >
             <label class="form-check-label" for="agricultural">
               Agricultural
             </label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio"  id="residential" name="land_type" value="residential" >
             <label class="form-check-label" for="residential">
               Residential
             </label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio"  id="commercial" name="land_type" value="commercial" checked>
             <label class="form-check-label" for="commercial">
               Commercial
             </label>
           </div>
       <?php  }?>

       

</div>

<div class="form-outline mb-4">
                    <div class="row">
                      <div class="col">
                        <label for="land_edit_place">Place:</label>
                        <input class="form-control" required id="land_edit_place" name="land_place" placeholder="Enter place" value="<?php echo $row['Place'];?>">
                    </div>
                    <div class="col">
                        <label for="land_edit_sqft">Land Size (katha):</label>
                        <input type="number" class="form-control" required id="land_edit_sqft" name='land_sqft' min="1" value="<?php echo $row['Land_Size'];?>">
                        <a href="http://landmeasurementbd.blogspot.com/2017/06/online-area-converter-in-land-measurement.html" target="_blank">Calculate Here</a>
                      </div>
                  </div>
                </div>

<div class="form-outline mb-4 ">
<div class="row">
  <div class="col">
    <label for="land_edit_price">Price (TK):</label>
<input  type="number" class="form-control" required id="land_edit_price" name="land_price" value="<?php echo $row['Price'];?>">
</div>
<div class="col">
  <label for="land_edit_contact">Contact information:</label>
  <textarea class="form-control" rows="3" required id="land_edit_contact" name="land_contact"><?php echo $row['Contact_info'];?></textarea>
</div>
</div>
</div>

  <div class="form-outline mb-3">
  <label for="land_edit_img">Image: (Leave Empty if not intended to change)</label>
  <input type="file"  accept="image/*" id="land_edit_img" name="land_img" value="<?php echo $row['img'];?>">
</div>

<input type="hidden" name="land_id" id="land_id"  value="<?php echo $row['id']; ?>">
<div class="d-flex justify-content-center">
  <button type="submit" class="btn btn-outline-success pay" name="land_edit">Submit</button>
</div>   
</form>
</div>
    </div>
    </div>
<?php } ?>