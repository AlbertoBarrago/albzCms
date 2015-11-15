<table class="table">
    <thead>
      <tr>
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
