<?php

  $query = "SELECT * FROM posts";
  $select_posts_by_id = mysqli_query($connection,$query);

  while($row = mysqli_fetch_assoc($select_posts_by_id)){
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_tags = $row['post_tags'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_comments = $row['post_comment_count'];
    $post_date = $row['post_date'];

 }

?>


<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
      <label for="title">Post Title</label>
      <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
  </div>

  <div class="form-group">
      <label for="post_category">Post Category Id</label>
      <input value="<?php echo $post_category; ?>" type="text" class="form-control" name="post_category_id">
  </div>

  <div class="form-group">
      <label for="post_author">Post Author</label>
      <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">
  </div>

  <div class="form-group">
      <label for="post_status">Post Status</label>
      <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
  </div>

  <div class="form-group">
      <label for="post_image">Post Image</label>
      <input value="<?php echo $post_image; ?>" type="file" name="image">
  </div>

  <div class="form-group">
      <label for="post_tags">Post Tags</label>
      <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
  </div>

  <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea name="post_content" class="form-control" rows="10" cols="30">
      <?php echo $post_content; ?>
      </textarea>
  </div>

  <div class="form-group">
  <input type="submit" name="create_post" value="Add Post" class="btn btn-default">

  </div>

</form>
