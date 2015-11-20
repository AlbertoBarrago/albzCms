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
                $query = "SELECT * FROM posts";
                $select_all_posts_query = mysqli_query($connection,$query);

                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
                  $post_author = $row['post_author'];
                  $post_date = $row['post_date'];
                  $post_image = $row['post_image'];
                  $post_content = substr($row['post_content'],0,100);
                  $post_status = $row['post_status'];

                  if($post_status !== 'approved'){

                     echo "<h1 class='text-center'>No post Here sorry</h1>";

                  } else {

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
                      by <a href="index.php"><?php echo $post_author; ?></a>
                  </p>
                  <p><span class="glyphicon glyphicon-time"></span> Posted on August <?php echo $post_date; ?></p>
                  <hr>
                  <a href="post.php?p_id=<?php echo $post_id ?>">
                    <img class="img-responsive shrinkImage" src="images/<?php echo $post_image; ?>" alt="image_1">
                  </a>
                  <hr>
                  <p><?php echo $post_content; ?></p>
                  <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

              <?php  }} ?>


                <!-- Pager -->
                <?php include "includes/pager.php"; ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
      <?php include "includes/sidebar.php"; ?>
        <!-- /.row -->

<?php include "includes/footer.php"; ?>
