 <?php
include_once('header.php');
?>
  <div class="container">
<div id="carouselExampleCaptions" class="carousel slide mb-3" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
  </div>

  <div class="carousel-inner ">
    <div class="carousel-item active">
    <img src="../project/img/banner1.jpg" class="d-block w-100 banner" alt="...">
      <div class="carousel-caption">
      <img src="../project/img/icon.png" class="rounded mx-auto" alt="icon" id="icon">  
            <h1 class="heading_name">PROPERTY BUY & SELL</h1>    
            <a href="../project/buyerview.php" class="btn btn-outline-light mb-3">View Properties</a>
      </div>
    </div>
    <div class="carousel-item">
    <img src="../project/img/banner.jpeg" class="d-block w-100 banner" alt="...">
      <div class="carousel-caption">
        <h2>Click here to post a property</h2>
        <?php if (isset($_SESSION['username']) && $_SESSION['role']=='user'){?>
        <a class="btn btn-outline-light mb-3" href="sellerView.php">Post AD</a>
        <?php } 
        else if (isset($_SESSION['username']) && $_SESSION['role']=='admin'){?>
            <a class="btn btn-outline-light mb-3" href="admin_dashboard.php">Post AD</a>
            <?php }
            else {?>
                <a class="btn btn-outline-light mb-3" href="#" data-bs-toggle="modal" data-bs-target="#RegiModal">Post AD</a>
                <?php }?>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


            
            <div id="about_us">
           <details class="text-center fw-bold mb-2"><summary>About us</summary>
      <p>Property buy and sell is a website where you will be able to see properties such as - land, apartment etc. You will also be able to post
    ads for your properties by creating an account. Please be careful while buying and selling things online.</p>
    <p class="fst-italic text-uppercase"> ~THANK YOU~ </p>
</details>
            </div>


<?php 
    include_once("footer.php"); ?>

