<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->

    <?php  include "includes/navigation.php"; ?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

            <div class="col-md-8">

               <?php

                    if(isset($_POST['submit'])){

                    $search = $_POST['search'];

                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' OR post_author LIKE '%$search%' ";
                    $query .= "OR post_content LIKE '%$search%' ";
                    $search_query = mysqli_query($connection, $query);

                    if(!$search_query) {

                        die("QUERY FAILED" . mysqli_error($connection));

                    }

                    $count = mysqli_num_rows($search_query);

                    if($count == 0) {

                        echo "<h1> NO RESULT</h1>";

                    } else {

            while($row = mysqli_fetch_assoc($search_query)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_views_count = $row['post_views_count'];

                ?>

          <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?author=<?php echo $post_author; ?>&p_id=<?php echo $the_post_id; ?>"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August <?php echo $post_date; ?> | <span class="fa fa-eye"></span> <?php echo $post_views_count; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="image_1">
                <hr>
                <p><?php echo $post_content; ?></p>

                <hr>


           <?php }
         }}?>


            </div>

            <?php include "includes/sidebar.php";?>


<?php include "includes/footer.php";?>
