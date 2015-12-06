<?php

  if(isset($_GET['p_id'])){

    $the_post_id = $_GET['p_id'];

  }

  $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
  $select_posts_by_id = mysqli_query($connection,$query);

  while($row = mysqli_fetch_assoc($select_posts_by_id)){

    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_user = $row['post_user'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_tags = $row['post_tags'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_comments = $row['post_comment_count'];
    $post_date = $row['post_date'];

 }


   if(isset($_POST['update_post'])){

     $post_title = $_POST['title'];
     $post_category_id = $_POST['post_category'];
     $post_user = $_POST['post_user'];
     $post_status = $_POST['post_status'];
     $post_image = $_FILES['image']['name'];
     $post_image_temp = $_FILES['image']['tmp_name'];
     $post_content = $_POST['post_content'];
     $post_tags = $_POST['post_tags'];


     move_uploaded_file($post_image_temp, "../images/$post_image");

     if(empty($post_image)){

       $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
       $select_image = mysqli_query($connection, $query);

       while($row = mysqli_fetch_assoc($select_image)){

         $post_image = $row['post_image'];

       }

     }

     $query = "UPDATE posts SET ";
     $query .="post_title = '{$post_title}', ";
     $query .="post_user = '{$post_user}', ";
     $query .="post_category_id = '{$post_category_id}', ";
     $query .="post_date = now(), ";
     $query .="post_status = '{$post_status}', ";
     $query .="post_tags = '{$post_tags}', ";
     $query .="post_content = '{$post_content}', ";
     $query .="post_image = '{$post_image}' ";
     $query .= "WHERE post_id = {$the_post_id} ";

     $update_post = mysqli_query($connection, $query);

     if(!$update_post) {
       die("Query Failed" . mysqli_error($connection));
     }

     echo "<div class='alert alert-success' role='alert'> Post Updated: " . " " . "<a href='../post.php?p_id={$the_post_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a> " . "</div>";


   }

?>


<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
      <label for="title">Post Title</label>
      <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
  </div>

  <div class="form-group">
   <label for="users">Users</label>
   <select name="post_user" class="form-control">
     <option value='<?php echo $post_user; ?>'>Select User : actual user <?php echo $post_user; ?></option>
    <?php

      $query_user = "SELECT * FROM users";
      $select_user = mysqli_query($connection,$query_user);


      while($row = mysqli_fetch_assoc($select_user)) {
      $user_id = $row['user_id'];
      $user_title = $row['username'];

      echo "<option value='$user_title'>{$user_title}</option>";

      }

    ?>
   </select>

  </div>

  <div class="form-group">
   <label for="categories">Categories</label>
   <select name="post_category" id="" class="form-control">
    <?php

      $query = "SELECT * FROM category ";
      $select_categories = mysqli_query($connection,$query);

      while($row = mysqli_fetch_assoc($select_categories )) {
      $cat_id = $row['cat_id'];
      $cat_title = $row['cat_title'];


      if($cat_id == $post_category_id) {
       

        echo "<option selected value='{$cat_id}'>{$cat_title}</option>";


        } else {
	        
	         echo "<option value='{$cat_id}'>{$cat_title}</option>";
	        
        }

      }

    ?>
   </select>

  </div>

   <div class="form-group">
    <select name="post_status" id="" class="form-control">
      <option value="<?php echo $post_status; ?>" class="form-control"><?php echo $post_status; ?></option>

      <?php

        if($post_status == 'published') {

          echo '<option value="draft">Draft</option>';

        } else {

          echo '<option value="published">Published</option>';

        }

      ?>
    </select>
  </div>

  <div class="form-group">
      <img src="../images/<?php echo $post_image; ?>" alt="post_image" style="width=190px;height:50px"; />
      <input type="file" name="image">
  </div>

  <div class="form-group">
      <label for="post_tags">Post Tags</label>
      <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
  </div>

  <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea name="post_content" class="form-control" rows="10" cols="30"><?php echo $post_content; ?>
      </textarea>
  </div>

  <div class="form-group">
  <input type="submit" name="update_post" value="Edit Post" class="btn btn-default">

  </div>

</form>
