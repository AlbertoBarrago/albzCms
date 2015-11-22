<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Image</th>
        <th>Role</th>
        <th>Admin</th>
        <th>Subscriber</th>
      </tr>
    </thead>
    <tbody>

        <?php

        $query = "SELECT * FROM users";
        $select_users = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_users)){
          $user_id = $row['user_id'];
          $username = $row['username'];
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
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td><img style='width:90px; heigth:50px;' src='../images/users/{$user_image}' alt='user_image'></td>";
            echo "<td>{$user_role}</td>";
            echo "<td> <a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
            echo "<td> <a href='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
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
          if(isset($_GET['change_to_subscriber'])){
            $the_user_id = $_GET['change_to_subscriber'];

            $query ="UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id ";
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
