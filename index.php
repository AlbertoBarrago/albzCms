<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Intro Header - Above the fold  -->
      <div class="row">
        <div class="col-md-12" id="above_the_fold">
          <h1 class="text-center">alBz Blog</h1>
          <h5 class="text-center">Code, Design and Awesome Things</h5>
        </div>
      </div>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

              <?php

                $per_page = 2;

                  if(isset($_GET['page'])) {

                    $page = $_GET['page'];

                  }  else {

                    $page = "";

                  }

                  if($page == "" || $page == 1){
                    $page_1 = 0;
                  } else {
                    $page_1 = ($page * $per_page) - $per_page;
                  }


                $post_query_count = "SELECT * FROM posts";
                $find_count = mysqli_query($connection, $post_query_count);
                $count = mysqli_num_rows($find_count);

                $count = ceil($count / $per_page);

                $query = "SELECT * FROM posts LIMIT $page_1, $per_page";
                $select_all_posts_query = mysqli_query($connection,$query);

                while($row = mysqli_fetch_array($select_all_posts_query)) {
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
                  $post_user = $row['post_user'];
                  $post_date = $row['post_date'];
                  $post_image = $row['post_image'];
                  $post_content = substr($row['post_content'],0,100);
                  $post_status = $row['post_status'];

                  if($post_status == 'published'){

                  ?>

                  <h1 class="page-header">
                      Page Heading
                      <small>Secondary Text</small>
                  </h1>

                  <!-- First Blog Post -->
                  <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                  </h2>
                  <p class="lead">
                      by <a href="author_post.php?author=<?php echo $post_user; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_user; ?></a>
                  </p>
                  <p><span class="glyphicon glyphicon-time"></span> Posted on August <?php echo $post_date; ?></p>
                  <hr>
                  <a href="post.php?p_id=<?php echo $post_id; ?>">
                    <img class="img-responsive shrinkImage" src="images/<?php echo $post_image; ?>" alt="image_1">
                  </a>
                  <hr>
                  <p><?php echo $post_content; ?></p>
                  <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <i class="glyphicon glyphicon-chevron-right"></i></a>

                <hr>

              <?php }}?>


                <!-- Pager -->
                <ul class="pager">

                  <?php

                    if($page != 1){

                    $prev_page = $page - 1;

                    echo "<li><a href='index.php?page={$prev_page}'>PREV</a></li>";

                    }

                    for($i = 1; $i <= $count ; $i++){

                    if($i == $page || ($i == 1 && $page == 1)){

                    echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";

                    } else {

                    echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";

                    }

                    }

                    if($page != $count){

                    $next_page = $page + 1;

                    echo "<li><a href='index.php?page={$next_page}'>NEXT</a></li>";

                    }

                    ?>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
      <?php include "includes/sidebar.php"; ?>
        <!-- /.row -->

<?php include "includes/footer.php"; ?>
