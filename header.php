<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
     <script src="../project/regiValidate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<title>Property Buy And Sell</title>
<?php 
include_once('connection.php');
?>

</head>
<body>

  <!--Headnav-->
<nav class="navbar navbar-light navbar-expand-lg h-100 mb-3" id="headnav" >
<div class="container-fluid text-white ">
  <h1>🏠 Buy & Sell</h1>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNav">
  <ul class="nav ">
    <!--if logged in-->
    <?php
    if(isset($_SESSION['username']) && $_SESSION['role']=='admin'){?>   
      <li class="nav-item">
          <a class="nav-link text-white" href="admin_dashboard.php">👤 : <?php echo $_SESSION['username'];?></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-white" href="../project/main.php">Home</a>
        </li>
        <li class="nav-item">
         <a class="nav-link text-white" href="logout.php" onclick="return logout()">Log Out</a>
        </li>
        <?php }

        else if (isset($_SESSION['username']) && $_SESSION['role']=='user'){?>   
          <li class="nav-item">
              <a class="nav-link text-white" href="sellerView.php">👤 : <?php echo $_SESSION['username'];?></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link text-white" href="../project/main.php">Home</a>
            </li>
            <li class="nav-item">
             <a class="nav-link text-white" href="logout.php" onclick="return logout()">Log Out</a>
            </li>
            <?php }

else{
      ?>
      <!--if not logged in-->
        <li class="nav-item ">
          <a class="nav-link text-white" href="../project/main.php">Home</a>
        </li>
        <li class="nav-item">
        
        <a class="nav-link text-white" href="logIn.php" >Log In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#" data-bs-toggle="modal" data-bs-target="#RegiModal">Sign In</a>
        </li>
        <?php } ?>
      </ul>
  </div>
</div>
</nav>

<!--Registration Modal-->
<div class="modal fade" id="RegiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Create an account</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <form method="post" action="user_profile_query.php">
                  <div class="form-outline mb-4">
                    <label for="name">Name:</label>
                    <input  class="form-control" required id="reginame" name="reginame">
                  </div>
                    <div class="form-outline mb-4">
                      <label for="email">Email address:</label>
                      <input type="email" class="form-control" required id="regiemail"  name="regiemail">
                    </div>
                    <div class="form-outline mb-4">
                      <label for="pwd">Password:</label>
                      <input type="password" class="form-control" required id="regipwd" name="regipassword">
                    </div>
                    <div class="form-outline mb-4">
                    <label for="phn">Phone Number:</label>
                    <input  type="number" class="form-control" required id="regiphn" name="regiphonenumber">
                    </div>
                    <div class="d-flex justify-content-center">
                    <button onclick="return validateForm()" type="submit" class="btn btn-success" name="registration" >Submit</button>
                  </div>
                  </form>
      </div>
    </div>
  </div>
</div> 

  
          <div class="mainbody h-100">
    
