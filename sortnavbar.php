<!--side nav-->
<div class="side-navbar sticky-top navbar-expand-lg d-flex  flex-column mt-4" >
<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
  <span>Filter</span>
</button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Sort By :</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body" >
  <ul class="nav flex-column d-flex  justify-center-center" id="sortnavbar" >
      <form action="sort_result.php" method="POST">

<div class="mb-3">
<label for="category" class="fw-bold">Category</label>
  <select class="form-select"  name="category" id="category">
    <option  value="Please-select-a-Category">Please select one</option>
    <option value="Land" name="Land">Land</option>
        <option value="Apartment" name="Apartment">Apartment</option>
  </select>
</div>

<div class="mb-3">
<label for="price" class="fw-bold">Price</label>
<select class="form-select"  name="price" id="price">
    <option  value="Please-select-a-range">Please select a range</option>
    <option value="High-low" name="High-low">High-low</option>
        <option value="Low-high" name="Low-high">Low-high</option>
  </select>
</div>

<div class="mb-3">
<label for="land_option" class="fw-bold">Lands's place</label>
<br>
  <select class="form-select" name="land_option"  id="land_option">
    
  <option  value="" selected></option>
  <?php
    $query = mysqli_query(
      $mysqli_connection,
      'SELECT   DISTINCT  Place FROM land_post');
      $rowcount = mysqli_num_rows($query);

         for ($i = 0; $i < $rowcount; ++$i) {
             $row = mysqli_fetch_array($query); ?>
    <option name="land_place" value="<?php echo $row['Place']; ?>"><?php echo $row['Place']; ?></option> <?php
         } ?>        
  </select>
</div>


        



<div class="mb-3">
<label for="apt_option" class="fw-bold">Apatment's place</label>
<br>
  <select class="form-select" name="apt_option"  id="apt_option">
  <option  value="" selected></option>
  <?php
    $query = mysqli_query(
      $mysqli_connection,
      'SELECT   DISTINCT  place FROM apt_info');
      $rowcount = mysqli_num_rows($query);

         for ($i = 0; $i < $rowcount; ++$i) {
             $row = mysqli_fetch_array($query); ?>
    <option name="apt_place"  value="<?php echo $row['place']; ?>"><?php echo $row['place']; ?></option> <?php
         } ?>        
  </select>
</div>

<div class="d-flex justify-content-center mb-3">
     <button class="btn btn-outline-dark" type="submit" value="submit" name="search">Search</button>
     </div> 
    </form>
  </ul>
</div></div></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
      <script>
  $('#land_option').chosen();
  $('#apt_option').chosen();
</script>
  