<?php

  if(isset($_POST['create_post'])) {

    $post_category_id = $_POST['post_category'];
    $post_title = $_POST['title'];
    $post_user = $_POST['post_user'];
    $post_date = date('d-m-y');
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];
    $post_status = $_POST['post_status'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_category_id, post_title, post_user,  post_date, post_image, post_content, post_tags, post_status) ";
    $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_user}', now(), '{$post_image}' , '{$post_content}', '{$post_tags}', '{$post_status}') ";

    $create_post_query = mysqli_query($connection, $query);

    confirm($create_post_query);


    echo "<div class='alert alert-success' role='alert'> Post Added: " . " " . "<a href='posts.php'>View Post</a> " . "</div>";

  }
?>


<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
      <label for="title">Post Title</label>
      <input type="text" class="form-control" name="title">
  </div>

  <div class="form-group">
   <label for="users">Users</label>
   <select name="post_user" class="form-control">
    <?php

      $query_user = "SELECT * FROM users";
      $select_user = mysqli_query($connection,$query_user);


      while($row = mysqli_fetch_assoc($select_user)) {
      $user_id = $row['user_id'];
      $user_title = $row['username'];

      echo "<option value='{$user_title}'>{$user_title}</option>";

      }

    ?>
   </select>

  <div class="form-group">
      <label for="post_category">Post Category Id</label>
      <select class="form-control" name="post_category">

        <?php

        $query = "SELECT * FROM category";
        $select_categories = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_categories)){
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];

          echo "<option value='$cat_id'>{$cat_title}</option>";

        }

        ?>
      </select>
  </div>

  <div class="form-group">
      <label for="post_status">Post Status</label>

      <select class="form-control" name="post_status">
        <option value="draft">Select Options</option>
        <option value="published">Published</option>
        <option value="draft">Draft</option>
      </select>

  </div>

  <div class="form-group">
      <label for="post_image">Post Image</label>
      <input type="file" name="image">
  </div>

  <div class="form-group">
      <label for="post_tags">Post Tags</label>
      <input type="text" class="form-control" name="post_tags">
  </div>

  <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea name="post_content" class="form-control" rows="10" cols="30"></textarea>
  </div>

  <div class="form-group">

    <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">

  </div>


</form>
