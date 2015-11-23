<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

              <?php

                if(isset($_GET['page_id'])) {

                $the_page_id = $_GET['page_id'];

                $view_query_page = $query = "UPDATE pages SET page_views_count = page_views_count + 1 WHERE page_id = $the_page_id ";
                $send_query = mysqli_query($connection,$view_query_page);

                $query = "SELECT * FROM pages WHERE page_id = $the_page_id ";
                $select_all_pages_query = mysqli_query($connection,$query);

                while($row = mysqli_fetch_assoc($select_all_pages_query)) {

                  $page_title = $row['page_title'];
                  $page_subtitle = $row['page_subtitle'];
                  $page_date = $row['page_date'];
                  $page_content = $row['page_content'];
                  $page_views_count = $row['page_views_count'];

                  ?>

                  <h1 class="page-header">
                      <?php echo $page_title; ?>
                      <small><?php echo $page_subtitle; ?></small>
                  </h1>



                  <p><span class="glyphicon glyphicon-time"></span> Created on August <?php echo $page_date; ?> | <span class="fa fa-eye"></span> <?php echo $page_views_count; ?></p>

                  <p><?php echo $page_content; ?></p>


              <?php  }}?>


        <!-- /.row -->

<?php include "includes/footer.php"; ?>
