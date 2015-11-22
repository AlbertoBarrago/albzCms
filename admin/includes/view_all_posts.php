<?php

if(isset($_POST['checkBoxArray'])){

  foreach($_POST['checkBoxArray'] as $postValueId ){

      $bulk_options = $_POST['bulk_options'];

      switch($bulk_options) {
        case 'published':
          $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
          $update_publish_status = mysqli_query($connection, $query);
        break;
        case 'draft':
          $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
          $update_draft_status = mysqli_query($connection, $query);
        break;
        case 'delete':
          $query = "DELETE FROM posts WHERE post_id = {$postValueId} ";
          $update_delete_status = mysqli_query($connection, $query);
        break;



      }

  }


}

?>
<form class="" action="" method="post">

  <table class="table">

    <div class="row">

    <div class="col-md-10">

      <div id="bulkOptionsContainer">

          <select class="form-control" name="bulk_options">
            <option value="">Select Options</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>

          </select>
      </div>

    </div>

    <div class="col-md-2">

        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="add_post.php">Add New</a>

    </div>


    <hr/>
  </div>


      <thead>
        <tr>
          <th><input id="selectAllBoxes" type="checkbox" name="name" value=""></th>
          <th>Id</th>
          <th>Author</th>
          <th>Title</th>
          <th>Category</th>
          <th>Status</th>
          <th>Images</th>
          <th>Tags</th>
          <th>Comments</th>
          <th>Date</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>

          <?php

            $query = "SELECT * FROM posts";
            $select_posts = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($select_posts)){
              $post_id = $row['post_id'];
              $post_author = $row['post_author'];
              $post_title = $row['post_title'];
              $post_category_id = $row['post_category_id'];
              $post_status = $row['post_status'];
              $post_tags = $row['post_tags'];
              $post_image = $row['post_image'];
              $post_comments = $row['post_comment_count'];
              $post_date = $row['post_date'];

              echo "<tr>";

            ?>

            <td><input class='checkBoxes' type='checkbox' name="checkBoxArray[]" value="<?php echo $post_id; ?>"></td>

            <?php

              echo "<td>{$post_id}</td>";
              echo "<td>{$post_author}</td>";
              echo "<td>{$post_title}</td>";

              $query = "SELECT * FROM category WHERE cat_id = {$post_category_id} ";
              $select_categories_id = mysqli_query($connection,$query);

              while($row = mysqli_fetch_assoc($select_categories_id)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<td>{$cat_title}</td>";
              }
              echo "<td>{$post_status}</td>";
              echo "<td><img style='width:90px; heigth:50px;' src='../images/{$post_image}' alt='image_post'></td>";
              echo "<td>{$post_tags}</td>";
              echo "<td>{$post_comments}</td>";
              echo "<td>{$post_date}</td>";
              echo "<td> <a href='?source=edit_post&p_id={$post_id}'>Edit</a></td>";
              echo "<td> <a href='?delete={$post_id}'>Delete</a></td>";
              echo "</tr>";

            }

            if(isset($_GET['delete'])){
              $the_post_id = $_GET['delete'];

              $query ="DELETE FROM posts WHERE post_id = $the_post_id ";
              $delete_query = mysqli_query($connection, $query);

              header('Location: posts.php');

            }

          ?>

      </tbody>
  </table>
</form>
