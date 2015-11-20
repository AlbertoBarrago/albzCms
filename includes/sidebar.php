<div class="col-md-4">
  <?php

    if(isset($_POST['submit'])){

      $search = $_POST['search'];

      $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
      $search_query = mysqli_query($connection, $query);

      if(!$search_query){
        die("query failed" . mysqli_error($connection));
      }

      $count = mysqli_num_rows($search_query);

      if($count == 0) {

        echo "NO RESULT";

      }

    }


  ?>

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
        <div class="input-group">
            <input name="search" type="text" class="form-control">
            <span class="input-group-btn">
                <button name="submit" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
        </form><!--search form-->
        <!-- /.input-group -->
    </div>

    <?php



      if($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Guess') {

        $username_session = $_SESSION['username'];

          echo  '<div class="well"><h3>Sei loggato come, ' . $username_session . '</h3>' .  '<hr/> <h5> Links </h5>
                 <ul class="list-unstyled"> <li> <a href="admin">Admin Panel</a> </li> 
                 <li> <a href="includes/logout.php">Log Out</a> </li> </ul>' . '</div>';


      } else {

          echo '<div class="well">
                <h4>Login</h4>
                <form action="includes/login.php" method="post">
                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="Enter Username">

                </div>
                  <div class="input-group">
                    <input name="password" type="password" class="form-control" placeholder="Enter Password">
                    <span class="input-group-btn">
                       <button class="btn btn-primary" name="login" type="submit">Submit
                       </button>
                    </span>

                </div>
              </form>

            </div>';

    }

    ?>



    <!-- Blog Categories Well -->
    <div class="well">

      <?php //LIMIT 3 for example if there are many categories
        $query = "SELECT * FROM category";
        $select_categories_sidebar = mysqli_query($connection, $query);
      ?>
        <h4>Link Utili</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                  <h5>Categorie</h5>
                  <?php
                    while($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];

                    echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                  }
                  ?>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="list-unstyled">
                  <h5>Articoli</h5>
                  <?php

                    $query = "SELECT * FROM posts";
                    $select_all_posts = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($select_all_posts)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];

                    echo "<li><a href='post.php?p_id=$post_id'>{$post_title}</a></li>";
                  }
                  ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "includes/widget.php" ?>

</div>

</div>
