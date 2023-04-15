<?php
include_once 'header.php';
?>


<table class="container table table-striped table-hover table-bordered">
<thead>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email address</th>
    <th>Phone number</th>
    <th>See Post</th>
    <th>Delete user</th>
  </tr>
</thead>
<?php
include_once 'connection.php';
$query = mysqli_query(
        $mysqli_connection,
        'SELECT * FROM user_info where role!="admin"');
    $rowcount = mysqli_num_rows($query);?>

    <tbody>
      
  <?php  if($rowcount==0){?>
    <P> No data to show</p>
    <?php   }
    else {
    for ($i = 0; $i < $rowcount; ++$i) {
        $row = mysqli_fetch_array($query); ?>
        
<tr>
                      <td><?php echo $row['id']; ?></td>
                      <td> <?php echo $row['Name']; ?></td>
                      <td><?php echo $row['Email_address']; ?></td>
                      <td><?php echo $row['phone_number']; ?></td>
                      <td>Total: <?php echo $row['totalPost'];?>  <a href="seller_post_view.php?user_id=<?php echo $row['id']; ?>" class="link">(view)</a></td>
                   <td><a href="delete_user.php?id=<?php echo $row['id']; ?>" onclick='return checkdelete()' class="link" >❌</a></td>

    </tr>
    
                <?php
    }}
    ?>
    </tbody>
    </table>
    
    <script src="check_delete.js"></script>
                <?php
include_once 'footer.php';
    ?>
