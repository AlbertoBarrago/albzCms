<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Password</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Image</th>
        <th>Role</th>
        <th>Admin</th>
        <th>Guess</th>
      </tr>
    </thead>
    <tbody>

        <?php

        $query = "SELECT * FROM users";
        $select_users = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_users)){
          $user_id = $row['user_id'];
          $username = $row['username'];
          $user_password = $row['user_password'];
          $user_firstname = $row['user_firstname'];
          $user_lastname = $row['user_lastname'];
          $user_email = $row['user_email'];
          $user_image = $row['user_image'];
          $user_role = $row['user_role'];
          $user_randSalt = $row['user_randSalt'];


            echo "<div class='row'>";
            echo "<div class='col-md-12'>";
            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$user_password}</td>";
            // $query = "SELECT * FROM category WHERE cat_id = {$post_category_id} ";
            // $select_categories_id = mysqli_query($connection,$query);
            //
            // while($row = mysqli_fetch_assoc($select_categories_id)){
            //   $cat_id = $row['cat_id'];
            //   $cat_title = $row['cat_title'];
            //
            //   echo "<td>{$cat_title}</td>";
            // }
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td><img style='width:90px; heigth:50px;' src='../images/users/{$user_image}' alt='user_image'></td>";
            echo "<td>{$user_role}</td>";
            echo "<td> <a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
            echo "<td> <a href='users.php?change_to_guess={$user_id}'>Guess</a></td>";
            echo "<td> <a href='?source=edit_user&user_id={$user_id}'>Edit</a></td>";
            echo "<td> <a href='?delete={$user_id}'>Delete</a></td>";
            echo "</tr>";
            echo "</div>";
            echo "</div>";

          }

          // Change status on Unapprove status for user
          if(isset($_GET['change_to_admin'])){
            $the_user_id = $_GET['change_to_admin'];

            $query ="UPDATE users SET user_role = 'Admin' WHERE user_id = $the_user_id ";
            $unapprove_query = mysqli_query($connection, $query);

            header('Location: users.php');

          }
          if(isset($_GET['change_to_guess'])){
            $the_user_id = $_GET['change_to_guess'];

            $query ="UPDATE users SET user_role = 'Guess' WHERE user_id = $the_user_id ";
            $unapprove_query = mysqli_query($connection, $query);

            header('Location: users.php');

          }


          if(isset($_GET['delete'])){
            $the_user_id = $_GET['delete'];

            $query ="DELETE FROM users WHERE user_id = $the_user_id ";
            $delete_user = mysqli_query($connection, $query);

            header('Location: users.php');

          }

        ?>

    </tbody>
</table>
