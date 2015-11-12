<?php

  if(isset($_POST['create_post'])) {

    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count = 4;


    move_uploaded_file($post_image_temp, "../images/$post_image");

  }


?>

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
      <label for="title">Post Title</label>
      <input type="text" class="form-control" name="title">
  </div>

  <div class="form-group">
      <label for="post_category">Post Category Id</label>
      <input type="text" class="form-control" name="post_category_id">
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
