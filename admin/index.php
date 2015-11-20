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
                          ['Year', 'Sales', 'Expenses', 'Profit'],
                          ['2014', 1000, 400, 200],
                          ['2015', 1170, 460, 250],
                          ['2016', 660, 1120, 300],
                          ['2017', 1030, 540, 350]
                        ]);

                        var options = {
                          chart: {
                            title: 'Company Performance',
                            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
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
                    google.setOnLoadCallback(drawSeriesChart);

                    function drawSeriesChart() {

                      var data = google.visualization.arrayToDataTable([
                        ['ID', 'Life Expectancy', 'Fertility Rate', 'Region',     'Population'],
                        ['CAN',    80.66,              1.67,      'North America',  33739900],
                        ['DEU',    79.84,              1.36,      'Europe',         81902307],
                        ['DNK',    78.6,               1.84,      'Europe',         5523095],
                        ['EGY',    72.73,              2.78,      'Middle East',    79716203],
                        ['GBR',    80.05,              2,         'Europe',         61801570],
                        ['IRN',    72.49,              1.7,       'Middle East',    73137148],
                        ['IRQ',    68.09,              4.77,      'Middle East',    31090763],
                        ['ISR',    81.55,              2.96,      'Middle East',    7485600],
                        ['RUS',    68.6,               1.54,      'Europe',         141850000],
                        ['USA',    78.09,              2.05,      'North America',  307007000]
                      ]);

                      var options = {
                        title: 'Correlation between life expectancy, fertility rate and population of some world countries (2010)',
                        hAxis: {title: 'Life Expectancy'},
                        vAxis: {title: 'Fertility Rate'},
                        bubble: {textStyle: {fontSize: 11}}
                      };

                      var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
                      chart.draw(data, options);
                    }
                    </script>

                    <div id="series_chart_div" style="width: 100%; height: 500px;"></div>

                 </div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>
