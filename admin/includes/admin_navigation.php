<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Hey, <?php echo $_SESSION['firstname']; ?></a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
      <li><a href="#"> Online <b><?php echo usersOnline(); ?></b></a></li>
      <li><a href="../index.php">View Front-End</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown">
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                            <span class="pull-left">
                                <img class="media-object" src="http://placehold.it/50x50" alt="">
                            </span>
                            <div class="media-body">
                                <h5 class="media-heading">
                                    <strong><?php echo $_SESSION['firstname']; ?></strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-footer">
                    <a href="#">Read All New Messages</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu alert-dropdown">
                <li>
                    <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">View All</a>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>

              <li>
                  <a href="javascript:;" data-toggle="collapse" data-target="#post"><i class="fa fa-fw fa-table"></i> Post <i class="fa fa-fw fa-caret-down"></i></a>
                  <ul id="post" class="collapse">

                      <li>
                          <a href="posts.php?source=add_post">Add Post</a>
                      </li>
                      <li>
                          <a href="posts.php">View All Posts</a>
                      </li>

                  </ul>
              </li>

            <li>
                <a href="categories.php"><i class="fa fa-fw fa-edit"></i> Categories</a>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#page"><i class="fa fa-plus-square"></i> Page <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="page" class="collapse">

                    <li>
                        <a href="pages.php?source=add_page">Add Page</a>
                    </li>
                    <li>
                        <a href="pages.php">View All Pages</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
            </li>
            <li>
              <a href="javascript:;" data-toggle="collapse" data-target="#user"><i class="fa fa-fw fa-user"></i> User <i class="fa fa-fw fa-caret-down"></i></a>
              <ul id="user" class="collapse">
                  <li>
                      <a href="users.php?source=add_user">Add User</a>
                  </li>
                  <li>
                      <a href="users.php">View All Users</a>
                  </li>
              </ul>
            </li>
            <li>
                <a href="profile.php"><i class="fa fa-stethoscope"></i> Profile</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
