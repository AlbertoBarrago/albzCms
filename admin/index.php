<?php include "includes/admin_header.php"; ?>


    <div id="wrapper">

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
                  <?php

                    $query = "SELECT * FROM posts WHERE post_status = 'published' ";
                    $published_posts = mysqli_query($connection, $query);
                    $post_published_count = mysqli_num_rows($published_posts);

                    $query = "SELECT * FROM posts WHERE post_status = 'draft' ";
                    $draft_posts = mysqli_query($connection, $query);
                    $post_draft_count = mysqli_num_rows($draft_posts);

                    $query = "SELECT * FROM comments WHERE comment_status = 'unapprove' ";
                    $unapproved_comments = mysqli_query($connection, $query);
                    $unapproved_comment = mysqli_num_rows($unapproved_comments);

                    $query = "SELECT * FROM users WHERE user_role = 'subscriber' ";
                    $select_all_subscriber = mysqli_query($connection, $query);
                    $subscriber_unapproved = mysqli_num_rows($select_all_subscriber);
                  ?>

                <div class="row">
                  <div class="col-md-12">
                    <script type="text/javascript">
                      google.load("visualization", "1.1", {packages:["bar"]});
                      google.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Data', 'Count'],

                            <?php

                              $element_text = ['All Post', 'Action Post', 'Draft Posts', 'Comments', 'Pending Comments' , 'Total Users', 'Subscriber Users' , 'Categories'];
                              $element_count = [$post_counts,$post_published_count,  $post_draft_count, $comment_counts, $unapproved_comment ,$user_counts, $subscriber_unapproved , $category_counts];

                              for($i = 0; $i < 8; $i++){
                                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                              }

                            ?>
                        ]);
                        var options = {
                          chart: {
                            title: 'General Activities',
                            subtitle: 'Dati utili per la scansione di utilizzo',
                          }
                        };
                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                        chart.draw(data, options);
                      }
                    </script>

                    <div id="columnchart_material" style="width: 100%; height: 500px;"></div>

                  </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>
