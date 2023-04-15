<!--profile edit Modal-->
<?php
if (isset($_SESSION['id'])) {
        $sql = "SELECT *FROM user_info WHERE id='".$_SESSION['id']."'";
        $sql_run = mysqli_query($mysqli_connection, $sql);
        if (mysqli_query($mysqli_connection, $sql)) {
            $row = mysqli_fetch_array($sql_run); ?>
<div class="modal fade" id="edit_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Edit profile information</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="user_profile_query.php">
        <?php
        if ($_SESSION['role'] == 'admin') {?>
          <div class="form-outline mb-4">
          <label for="name">Name:</label>
          <input  class="form-control text-muted" required id="EditAdminName" name="reginame" value="<?php echo $row['Name']; ?>" readonly >
        </div>
 <?php       } else {?>
          <div class="form-outline mb-4">
          <label for="name">Name:</label>
          <input  class="form-control" required id="EditUserName" name="reginame" value="<?php echo $row['Name']; ?>">
        </div>
 <?php } ?>
                    <div class="form-outline mb-4">
                      <label for="email">Email address:</label>
                      <input type="email" class="form-control" required id="EditEmail"  name="regiemail" value="<?php echo $row['Email_address']; ?>">
                    </div>
                    <div class="form-outline mb-4">
                      <label for="pwd">Password:</label>
                      <input type="password" class="form-control" required id="EditPwd" name="regipassword" value="<?php echo $row['Password']; ?>">
                    </div>
                    <div class="form-outline mb-4">
                    <label for="phn">Phone Number:</label>
                    <input  type="number" class="form-control" required id="EditPhn" name="regiphonenumber" value="<?php echo $row['phone_number']; ?>">
                    </div>
      <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success" name="edit_profile" >Submit</button>
                  </div>
                  </form>
      </div>
    </div>
  </div>
</div> <?php
        }
    } ?>