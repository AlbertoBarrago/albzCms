<?php include "includes/admin_header.php"; ?>

 <div id="wrapper">

  <!-- Nagivation -->
  <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Post Section
                        <small>View and Creating Posts</small>
                    </h1>

                    <?php
                      if(isset($_GET['source'])){
                        $source = $_GET['source'];
                      } else {
                        $source = '';

                      }

                      switch ($source) {
                        case 'add_posts':
                          include "includes/add_posts.php";
                          break;

                        default:
                          include "includes/view_all_posts.php";
                          break;
                      }
                    ?>
                </div>
           </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
