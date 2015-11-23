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
                        Page
                        <small>Base of page</small>
                    </h1>

                    <?php
                      if(isset($_GET['source'])){
                        $source = $_GET['source'];
                      } else {
                        $source = '';

                      }

                      switch ($source) {
                        case 'add_page':
                          include "includes/add_page.php";
                          break;

                        case 'edit_post':
                          include "includes/edit_page.php";
                          break;

                        default:
                          include "includes/view_all_pages.php";
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
