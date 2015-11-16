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
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
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
            echo "<td>{$user_randSalt}</td>";
            echo "<td> <a href='?source=edit_user&user_id={$user_id}'>Edit</a></td>";
            echo "<td> <a href='?delete={$user_id}'>Delete</a></td>";
            echo "</tr>";

          }


          if(isset($_GET['delete'])){
            $the_user_id = $_GET['delete'];

            $query ="DELETE FROM posts WHERE user_id = $the_user_id ";
            $delete_user = mysqli_query($connection, $query);

            header('Location: users.php');

          }

        ?>

    </tbody>
</table>
