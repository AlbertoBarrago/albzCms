<?php

  if(isset($_GET['user_id'])){

    $the_user_id = $_GET['user_id'];

  $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
  $select_users_by_id = mysqli_query($connection,$query);

  while($row = mysqli_fetch_assoc($select_users_by_id)){

    $user_id = $row['user_id'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];

 }

 if(isset($_POST['update_user'])){

   $user_firstname = $_POST['user_firstname'];
   $user_lastname = $_POST['user_lastname'];
   $username = $_POST['username'];
   $user_password = $_POST['user_password'];
   $user_email = $_POST['user_email'];
   $user_image = $_FILES['user_image']['name'];
   $user_image_temp = $_FILES['user_image']['tmp_name'];
   $user_role = $_POST['user_role'];

   move_uploaded_file($user_image_temp, "../images/users/$user_image");

   if(empty($user_image)){

     $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
     $select_user_image = mysqli_query($connection, $query);

     while($row = mysqli_fetch_assoc($select_user_image)){

       $user_image = $row['user_image'];

     }

   }

   if(!empty($user_password)){

    $query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id";
    $get_user_query = mysqli_query($connection, $query_password);
    confirm($get_user_query);

    $row = mysqli_fetch_array($get_user_query);

    $db_user_password = $row['user_password'];


   if($db_user_password != $user_password) {

     $user_password = password_hash( $user_password, PASSWORD_BCRYPT, array('cost' => 10));

   }

   $query = "UPDATE users SET ";
   $query .="user_firstname = '{$user_firstname}', ";
   $query .="user_lastname = '{$user_lastname}', ";
   $query .="username = '{$username}', ";
   $query .="user_password = '{$user_password}', ";
   $query .="user_email = '{$user_email}', ";
   $query .="user_image = '{$user_image}', ";
   $query .="user_role = '{$user_role}' ";
   $query .= "WHERE user_id = {$the_user_id} ";

   $update_user = mysqli_query($connection, $query);

   echo "User Updated" . " <a href='users.php'>View Users</a>";

 }

  } } else {

    header("Location: index.php");

  }

?>


<form action="" method="post" enctype="multipart/form-data">

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
          <label for="user_firstname">First Name</label>
          <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
      </div>

    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label for="user_lastname">Last Name</label>
          <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
          <label for="user_author">Username</label>
          <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
          <label for="user_password">Password</label>
          <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
      </div>
    </div>

  </div>

  <div class="row">
      <hr>
    <div class="col-md-6 text-center">
      <img src='../images/users/<?php echo $user_image; ?>' alt='user_image_edit' style="width:120px;height:120px; display:block; position:relative; margin:0 auto;"; class="img-circle"/>
      <h1><?php echo $username; ?></h1>
      <h5>Have an awesome day ser <?php echo $user_lastname; ?></h5>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <div class="form-group">
            <label for="user_image">Select New Image</label>
            <input type="file" name="user_image">
        </div>
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-md-12">
      <hr>
      <div class="form-group">
          <label for="user_email">Email</label>
          <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
      </div>
    </div>
  </div>

<div class="row">
  <div class="col-md-3">
    <div class="form-group">
      <h3>Actual Role is <?php echo $user_role; ?></h3>

    </div>
  </div>
  <div class="col-md-5">
    <label for="user_role">User Role</label>

    <select class="form-control" name="user_role">
      <option value='<?php echo $user_role; ?>'>Select a Role</option>
      <?php
        if($user_role == 'subscriber') {

            echo "<option value='admin'>Admin</option>";

        } else {

          echo "<option value='subscriber'>Subscriber</option>";

        }

      ?>

    </select>
  </div>

</div>

<div class="row">
  <div class="col-md-12" style="position:relative;margin-top:5%;">
    <div class="form-group">
      <input type="submit" name="update_user" value="Update User" class="btn btn-default">
    </div>

  </div>
</div>


</form>
