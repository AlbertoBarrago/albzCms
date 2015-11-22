<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">alBogz</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

              <?php
                $query = "SELECT * FROM category";
                $select_all_categories_query = mysqli_query($connection,$query);

                while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                  $cat_id = $row['cat_id'];
                  $cat_title = $row['cat_title'];

                  echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                }


              ?>

            </ul>

            <?php



            $userOnline = $_SESSION['username'];

            if($_SESSION['role'] == 'Admin'){

              echo  "<ul class='nav navbar-nav navbar-right'>
                       <li><a href='admin'>Hey, {$userOnline} go to Admin Panel</a></li>
                     </ul>";

              } else if ($_SESSION['role'] == 'Guess') {

              echo "<ul class='nav navbar-nav navbar-right'>
                       <li><a href='admin'>Hey, {$userOnline} go to Guess Panel</a></li>
                     </ul>";

              }

              if(isset($_SESSION['role'])) {

                  if(isset($_GET['p_id'])) {

                      $the_posts_id = $_GET['p_id'];
                      echo "<ul class='nav navbar-nav navbar-right'> <li><a href='admin/posts.php?source=edit_post&p_id={$the_posts_id}'> <i class='fa fa-edit'></i> Edit Post</a></li></ul>";

                  }

              }


            ?>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
