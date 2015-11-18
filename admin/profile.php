<?php include "includes/admin_header.php"; ?>

  <?php
    if(isset($_SESSION['username'])){

        $username = $_SESSION['username'];

        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_user)){

          $user_id = $row['user_id'];
          $username = $row['username'];
          $user_password = $row['user_password'];
          $user_firstname = $row['user_firstname'];
          $user_lastname = $row['user_lastname'];
          $user_email = $row['user_email'];
          $user_image = $row['user_image'];
          $user_role = $row['user_role'];
          $user_randSalt = $row['user_randSalt'];


        }

    }
   ?>

   <?php

    if(isset($_POST['update_profile'])) {

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

        $query = "SELECT * FROM users WHERE user_id = $user_id ";
        $select_user_image = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_user_image)){

          $user_image = $row['user_image'];

        }

      }

      $query = "UPDATE users SET ";
      $query .="user_firstname = '{$user_firstname}', ";
      $query .="user_lastname = '{$user_lastname}', ";
      $query .="username = '{$username}', ";
      $query .="user_password = '{$user_password}', ";
      $query .="user_email = '{$user_email}', ";
      $query .="user_image = '{$user_image}', ";
      $query .="user_role = '{$user_role}' ";
      $query .= "WHERE user_id = {$user_id} ";

      $update_user = mysqli_query($connection, $query);

      if(!$update_user) {
        die("Query Failed" . mysqli_error($connection));
      }


    }

   ?>




 <div id="wrapper">

  <!-- Nagivation -->
  <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Profile Page
                        <small>some text</small>
                    </h1>

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
                        <div class="col-md-8">
                          <img src='../images/users/<?php echo $user_image; ?>' alt='user_image_edit' style="width:90%;height:290px"; />
                        </div>

                        <div class="col-md-4">
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
                          <option value='<?php echo $user_role; ?>'><?php echo $user_role; ?></option>
                          <?php
                            if(!$user_role) {

                                echo "<option value='Admin'>Admin</option>";

                            } else {


                              echo "<option value='Guess'>Guess</option>";

                            }

                          ?>

                        </select>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-12" style="position:relative;margin-top:5%;">
                        <div class="form-group">
                          <input type="submit" name="update_profile" value="Update Profile" class="btn btn-default">
                        </div>

                      </div>
                    </div>


                    </form>

                </div>
           </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
