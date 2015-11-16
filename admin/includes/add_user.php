<?php

  if(isset($_POST['create_user'])) {

    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];

    move_uploaded_file($user_image_temp, "../images/users/$user_image");

    $query = "INSERT INTO users( username, user_password,  user_firstname, user_lastname, user_image, user_email, user_role ) ";
    $query .= "VALUES( '{$username}', '{$user_password}', '{$user_firstname}' , '{$user_lastname}', '{$user_image}','{$user_email}', '{$user_role}') ";

    $create_user_query = mysqli_query($connection, $query);

    confirm($create_user_query);

  }
?>


<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
      <label for="user_firstname">First Name</label>
      <input type="text" class="form-control" name="user_firstname">
  </div>

  <div class="form-group">
      <label for="user_lastname">Last Name</label>
      <input type="text" class="form-control" name="user_lastname">
  </div>

  <div class="form-group">
      <label for="user_author">Username</label>
      <input type="text" class="form-control" name="username">
  </div>

  <div class="form-group">
      <label for="user_password">Password</label>
      <input type="password" class="form-control" name="user_password">
  </div>


  <div class="form-group">
      <label for="user_image">User Image</label>
      <input type="file" name="user_image">
  </div>

  <div class="form-group">
      <label for="user_email">Email</label>
      <input type="email" class="form-control" name="user_email">
  </div>



  <div class="form-group">
      <label for="user_role">User Role</label>
      <select class="form-control" name="user_role">
        <?php

        $query = "SELECT * FROM users";
        $select_role = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_role)){
          $user_id = $row['user_id'];
          $user_role = $row['user_role'];

          echo "<option value='$user_id'>{$user_role}</option>";


        }

        ?>
      </select>
  </div>

  <div class="form-group">

    <input class="btn btn-primary" type="submit" name="create_user" value="Create User">

  </div>


</form>
