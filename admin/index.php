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
                            Welcome to Admin Panel
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Main Control
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                  <div class="col-lg-3 col-md-6">
                   <div class="panel panel-primary">
                       <div class="panel-heading">
                           <div class="row">
                               <div class="col-xs-3">
                                   <i class="fa fa-file-text fa-5x"></i>
                               </div>
                               <div class="col-xs-9 text-right">

                                  <?php

                                    $query = "SELECT * FROM posts";
                                    $select_all_post = mysqli_query($connection, $query);
                                    $post_counts = mysqli_num_rows($select_all_post);

                                    echo "<div class='huge'>{$post_counts}</div>"

                                  ?>

                                   <div>Posts</div>
                               </div>
                           </div>
                       </div>
                       <a href="posts.php">
                           <div class="panel-footer">
                               <span class="pull-left">View Details</span>
                               <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                               <div class="clearfix"></div>
                           </div>
                       </a>
                   </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                   <div class="panel panel-green">
                       <div class="panel-heading">
                           <div class="row">
                               <div class="col-xs-3">
                                   <i class="fa fa-comments fa-5x"></i>
                               </div>
                               <div class="col-xs-9 text-right">

                                 <?php

                                   $query = "SELECT * FROM comments";
                                   $select_all_comment = mysqli_query($connection, $query);
                                   $comment_counts = mysqli_num_rows($select_all_comment);

                                   echo "<div class='huge'>{$comment_counts}</div>"

                                 ?>

                                 <div>Comments</div>
                               </div>
                           </div>
                       </div>
                       <a href="comments.php">
                           <div class="panel-footer">
                               <span class="pull-left">View Details</span>
                               <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                               <div class="clearfix"></div>
                           </div>
                       </a>
                   </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                   <div class="panel panel-yellow">
                       <div class="panel-heading">
                           <div class="row">
                               <div class="col-xs-3">
                                   <i class="fa fa-user fa-5x"></i>
                               </div>
                               <div class="col-xs-9 text-right">

                                 <?php

                                   $query = "SELECT * FROM users";
                                   $select_all_user = mysqli_query($connection, $query);
                                   $user_counts = mysqli_num_rows($select_all_user);

                                   echo "<div class='huge'>{$user_counts}</div>"

                                 ?>

                                   <div> Users</div>
                               </div>
                           </div>
                       </div>
                       <a href="users.php">
                           <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                           </div>
                       </a>
                   </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                   <div class="panel panel-red">
                       <div class="panel-heading">
                           <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-list fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">

                               <?php

                                 $query = "SELECT * FROM category";
                                 $select_all_category = mysqli_query($connection, $query);
                                 $category_counts = mysqli_num_rows($select_all_category);

                                 echo "<div class='huge'>{$category_counts}</div>"

                               ?>
                                  <div>Categories</div>
                             </div>
                           </div>
                       </div>
                       <a href="categories.php">
                           <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                           </div>
                       </a>
                   </div>
                  </div>
                </div>
                <!-- /.row -->

                <div class="row">

                  <div class="col-md-6">

                    <script type="text/javascript">
                      google.load("visualization", "1.1", {packages:["bar"]});
                      google.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Data', 'Count'],

                            <?php




                            ?>

                          ['Posts', 1000],
                        ]);

                        var options = {
                          chart: {
                            title: 'Some Title',
                            subtitle: 'Some subtitle',
                          }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, options);
                      }
                    </script>

                    <div id="columnchart_material" style="width: 100%; height: 500px;"></div>


                  </div>

                 <div class="col-md-6">

                   <script type="text/javascript">
                     google.load("visualization", "1", {packages:["corechart"]});
                     google.setOnLoadCallback(drawChart);
                     function drawChart() {
                       var data = google.visualization.arrayToDataTable([
                         ['Task', 'Hours per Day'],
                         ['Work',     11],
                         ['Eat',      2],
                         ['Commute',  2],
                         ['Watch TV', 2],
                         ['Sleep',    7]
                       ]);

                       var options = {
                         title: 'My Daily Activities',
                         pieHole: 0.4,
                       };

                       var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                       chart.draw(data, options);
                     }
                   </script>

                    <div id="donutchart" style="width: 100%; height: 500px;"></div>

                 </div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>
