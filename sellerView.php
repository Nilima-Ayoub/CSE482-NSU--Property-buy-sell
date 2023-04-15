<?php
include_once('header.php');
include_once("cookie.php");
include_once('profile_edit_modal.php');

if (isset($_SESSION['username']) && ($_SESSION['role'] == 'user')) {
?>
<!--Sidenavbar-->
              <div class="side-navbar sticky-top navbar-expand-lg d-flex  flex-column mt-4">

                <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                  <span>⚙️</span>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                  <div class="offcanvas-header">
                  <p class="offcanvas-title" id="offcanvasNavbarLabel">⚙️</p>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                <ul class="nav flex-column d-flex">

                <li><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#LandPostModal">
                <span class="mx-2">Post For Land</span>
              </li> </a>

                <li><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#AptPostModal">
                    <span class="mx-2">Post For Apartment</span>
                  </li> </a>

                  <li> <a href="../project/buyerview.php" class="nav-link">
                    <span class="mx-2">View other properties</span>
                  </li> </a>

                  <li> <a href="#" data-bs-toggle="modal" data-bs-target="#edit_profile" class="nav-link">
                    <span class="mx-2">Edit profile information</span>
                  </li> </a>
                </ul>
            </div></div></div>


<!--property view-->
<div class="container" id="productcard">

              <?php $id = $_SESSION['id'];
  $query1 = mysqli_query(
    $mysqli_connection,
    "SELECT * FROM apt_info where user_id='$id'");
  $aptRowCount = mysqli_num_rows($query1);

  $query2 = mysqli_query(
    $mysqli_connection,
    "SELECT * FROM land_post where user_id='$id'");
  $landRowCount = mysqli_num_rows($query2);

  if ($aptRowCount == 0 && $landRowCount == 0) { ?>
          <div class="row row-cols-1" >
          <h4 class="text-danger">Welcome, <?php echo $_SESSION['username']; ?>! please post something to show here.</h4>
         </div> 
         <?php
  }
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
                      <h5 class="card-title"><?php echo $row['title']; ?></h5>
                      <p class="card-text">Place: <?php echo $row['place']; ?></p>
                      <p class="card-text">Size: <?php echo $row['size']; ?>sqft</p>
                      <p class="card-text">Bedrooms: <?php echo $row['bedrooms']; ?></p>
                      <p class="card-text">Bathrooms: <?php echo $row['bathrooms']; ?></p>
                      <p class="card-text">Price: <?php echo $row['price']; ?>Tk</p>
                      <p class="card-text">Contact info:<?php echo $row['contact_info']; ?></p>
                      <a href="apt_edit.php?apt_id=<?php echo $row['id']; ?>" class="btn btn-outline-warning text-black" >✂️Edit</a>             
                      <a href="apt_post_delete.php?apt_id=<?php echo $row['id'];?>" onclick='return checkdelete()' class="btn btn-outline-danger text-black" >❌Delete</a>
                      <a href="apt_invoice.php?apt_id=<?php echo $row['id']; ?>"  class="btn btn-outline-danger text-black">Invoice</a>

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
                      <a href="land_edit.php?land_id=<?php echo $row['id']; ?>" class="btn btn-outline-warning text-black" >✂️Edit</a>
                      <a href="land_post_delete.php?land_id=<?php echo $row['id'];?>" onclick='return checkdelete()' class="btn btn-outline-danger text-black">❌Delete</a>
                      <a href="invoice.php?land_id=<?php echo $row['id']; ?>"  class="btn btn-outline-danger text-black">Invoice</a>
                    </div>
                </div>
                </div>
              <?php
    }
  }?>
        </div>
        </div>

<!--Apt post Modal-->
<div class="modal fade" id="AptPostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title" id="exampleModalLabel">Fill in the details (Apartment)</h4>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form method="post" action="product_query.php">

<div class="form-outline mb-4 ">
<label for="apt_titlename">Title: </label>
<input class="form-control" required id="apt_titlename" name="apt_titlename" placeholder="Keep it short!">
</div>

<div class="form-outline mb-4 ">
 <div class="row">
 <div class="col">
<label for="apt_place">Place:</label>
<input class="form-control" required id="apt_place" name="apt_place" placeholder="Enter place">
</div>

<div class="col">
<label for="apt_sqft">Size (sqft):</label>
<input type="number" class="form-control" required id="apt_sqft" name="apt_sqft" min="1">
</div></div></div>

<div class="form-outline mb-4">
<div class="row">
<div class="col">
  <label for="apt_bedrooms">Bedrooms:</label>
  <select class="dropdown" required id="apt_bedrooms" name="apt_bedrooms">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
</select>
</div>
<div class="col">
  <label for="apt_bathrooms">Bathrooms:</label>
  <select class="dropdown " required id="apt_bathrooms" name="apt_bathrooms" >
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
<label for="apt_price">Price (TK):</label>
<input  type="number" class="form-control" required id="apt_price" name="apt_price" min="1">
</div>

<div class="col">
  <label for="apt_contact">Contact information:</label>
  <textarea class="form-control" rows="3" required id="apt_contact" name="apt_contact"></textarea>
</div></div></div>

<div class="form-outline mb-4 ">
<label for="apt_img">Image:</label>
<input required type="file"  accept="image/*" name="apt_img" value="#" id="apt_img">
</div>

<div class="form-outline mb-4 text-center">
<img src="../project/img/bkash.png"  alt="...">

</div>

<div class="form-outline mb-4 text-center text-uppercase">
<p >Marchect:www.property buy and sell.com</p>
<label>Amount:</label>
<input type="text" class="text-center w-50" value="1000 tk" readonly>


</div>
<div class="form-outline mb-4 text-center text-uppercase">
<p >Your bKash account number</p>
<input type="number" class="text-center w-50"  required id="regiphn1">
</div>

<div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-outline-success pay" onclick="return check_phn()" name="apt_payment_submit"  >Proceed</a></button>
                </div>
</form>
    </div>
  </div>
</div>
</div>


<!--Land post Modal-->
<div class="modal fade" id="LandPostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title" id="exampleModalLabel">Fill in the details (Land)</h4>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form action="product_query.php" method="post">

                <div class="form-outline mb-4 ">
                  <label for="land_title">Title: </label>
                  <input class="form-control" required id="land_title" name="land_title" placeholder="Keep it short!">
                </div>

                <div class="form-outline mb-4 ">
                  
                    <label for="land_type">Land Type: </label>
                    <div class="form-check  form-check-inline">
                    <input class="form-check-input" type="radio"  id="agricultural" name="land_type" value="agricultural" checked>
                    <label class="form-check-label" for="agricultural">
                      Agricultural
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"  id="residential" name="land_type" value="residential">
                    <label class="form-check-label" for="residential">
                      Residential
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"  id="commercial" name="land_type" value="commercial">
                    <label class="form-check-label" for="commercial">
                      Commercial
                    </label>
                  </div>
                </div>

                <div class="form-outline mb-4">
                  <div class="row">
                    <div class="col">
                      <label for="land_place">Place:</label>
                      <input class="form-control" required id="land_place" name="land_place" placeholder="Enter place">

                  </div>
                  <div class="col">
                      <label for="land_sqft">Land Size (katha):</label>
                      <input type="number" class="form-control" required id="land_sqft" name='land_sqft' min="1">
                      <a href="http://landmeasurementbd.blogspot.com/2017/06/online-area-converter-in-land-measurement.html" target="_blank">Calculate Here</a>
                    </div>
                </div>
              </div>
              <div class="form-outline mb-4 ">
                <div class="row">
                  <div class="col">
                    <label for="land_price">Price (TK):</label>
                <input  type="number" class="form-control" required id="land_price" name="land_price" min="1">
                </div>
                <div class="col">
                  <label for="land_contact">Contact information:</label>
                  <textarea required class="form-control" rows="3" name="land_contact"></textarea>
                </div>
              </div>
              </div>

                  <div class="form-outline mb-4 ">
                  <label for="land_img">Image:</label>
                  <input required type="file"  accept="image/*" name="land_img" value="#">
                </div>
               
               
<div class="form-outline mb-4 text-center">
<img src="../project/img/bkash.png"  alt="...">

</div>

<div class="form-outline mb-4 text-center text-uppercase">
<p >Marchect:www.property buy and sell.com</p>
<label>Amount:</label>
<input type="text" class="text-center w-50" value="1000 tk" readonly>


</div>
<div class="form-outline mb-4 text-center text-uppercase">
<p >Your bKash account number</p>
<input type="number" class="text-center w-50"  required id="regiphn2">
</div>

<div class="d-flex justify-content-center">
                  <button type="submit"  class="btn btn-outline-success pay" onclick="return check_phn2()" name="land_details" >Proceed</a></button>
                </div>

                
              </form>
    </div>
  </div>
</div>
</div>

  <?php
}
else {
  echo '<script type="text/javascript"> window.location="main.php";</script>';
}
?>

<?php include_once '../project/footer.php';
?>
<script src="check_delete.js"></script>

<script>
   /* phone number check */
   function check_phn() {
    var phonenumber1 = document.getElementById("regiphn1").value;
var checkphn1=phonenumber1.toString();

if(checkphn1.charAt(0)!="0"||checkphn1.charAt(1)!="1"||checkphn1.length!=11){
    alert("check phone number: please enter a valid phone number");
    return false;
}
    else return true; 
}

function check_phn2() {
var phonenumber2 = document.getElementById("regiphn2").value;
var checkphn2=phonenumber2.toString();

if(checkphn2.charAt(0)!="0"||checkphn2.charAt(1)!="1"||checkphn2.length!=11){
    alert("check phone number: please enter a valid phone number");
    return false;
}
    else return true;
}
  </script>