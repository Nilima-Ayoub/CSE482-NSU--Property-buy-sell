<?php 
include_once('header.php'); 

$sql = "SELECT *FROM apt_info WHERE id='".$_GET['apt_id']."'";
$sql_run= mysqli_query($mysqli_connection,$sql);
if (mysqli_query($mysqli_connection, $sql)) {
    $row= mysqli_fetch_array($sql_run)
    ?>

    <div class=" container d-felx ">
      <div class="card  mx-auto" id="aptEdit_card">
      <div class="card-body">
        <h3 class="card-title text-center mb-4 ">Edit details (Apartment)</h3>
      <form method="post" action="product_query.php">

<div class="form-outline mb-4 ">
  <label for="apt_titlename">Title: </label>
  <input class="form-control" required id="apt_edit_titlename" name="apt_titlename" value="<?php echo $row['title'];?>">
</div>

<div class="form-outline mb-4 ">
  <label for="place">Place:</label>
  <input class="form-control" required id="apt_edit_place" name="apt_place" placeholder="Enter place" value="<?php echo $row['place'];?>">
</div>

<div class="form-outline mb-4">
  <label for="apt_sqft">Size (sqft):</label>
  <input type="number" class="form-control" required id="apt_edit_sqft" name="apt_sqft" value=<?php echo $row['size'];?>>
</div>

<div class="form-outline mb-4">
<div class="row">
  <div class="col">
    <label for="apt_bedrooms">Bedrooms:</label>
    <select class="dropdown" required id="apt_edit_bedrooms" name="apt_bedrooms">
    <option><?php echo $row['bedrooms'];?></option>
    <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
  </select>
  </div>
  <div class="col">
    <label for="apt_bathrooms">Bathrooms:</label>
    <select class="dropdown " required id="apt_edit_bathrooms" name="apt_bathrooms">
    <option><?php echo $row['bathrooms'];?></option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
  </select>
  </div>
</div>
</div>

<div class="form-outline mb-4 ">
  <div class="row">
    <div class="col">
  <label for="apt_edit_price">Price (TK):</label>
  <input  type="number" class="form-control" required id="apt_edit_price" name="apt_price" value="<?php echo $row['price']; ?>">
  </div>
  <div class="col">
    <label for="apt_contact">Contact information:</label>
    <textarea class="form-control" rows="3" required id="apt_edit_contact" name="apt_contact"><?php echo $row['contact_info']; ?></textarea>
  </div>
</div>
</div>
  <div class="form-outline mb-3 ">
  <label for="apt_edit_img">Image: (Leave Empty if not intended to change)</label>
  <input type="file"  accept="image/*" name="apt_img" id="apt_edit_img" value="img/<?php echo $row['img'];?>">
</div>


<input type="hidden" name="apt_id" id="apt_id"  value="<?php echo $row['id']; ?>">
<div class="d-flex justify-content-center">
  <button type="submit" class="btn btn-outline-success pay" name="apt_edit">Submit</button>
</div>
</form>
      </div>
    </div>
    </div>
<?php }
?>