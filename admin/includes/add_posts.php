<?php

  if(isset($_POST['create_post'])) {

    $post_category_id = $_POST['post_category'];
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_date = date('d-m-y');
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];
    $post_status = $_POST['post_status'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts( post_category_id, post_title, post_author,  post_date, post_image, post_content, post_tags, post_status) ";
    $query .= "VALUES( {$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}' , '{$post_content}', '{$post_tags}', '{$post_status}') ";

    $create_post_query = mysqli_query($connection, $query);

    confirm($create_post_query);

  }
?>


<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
      <label for="title">Post Title</label>
      <input type="text" class="form-control" name="title">
  </div>

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
      <label for="post_author">Post Author</label>
      <input type="text" class="form-control" name="author">
  </div>

  <div class="form-group">
      <label for="post_status">Post Status</label>
      <input type="text" class="form-control" name="post_status">
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
