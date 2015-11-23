<?php

  if(isset($_GET['page_id'])){

    $the_page_id = $_GET['page_id'];

  }

  $query = "SELECT * FROM pages WHERE page_id = $the_page_id ";
  $select_pages_by_id = mysqli_query($connection,$query);

  while($row = mysqli_fetch_assoc($select_pages_by_id)){

    $page_id = $row['page_id'];
    $page_theme = $row['page_theme'];
    $page_title = $row['page_title'];
    $page_subtitle = $row['page_subtitle'];
    $page_status = $row['page_status'];
    $page_content = $row['page_content'];
    $page_date = $row['page_date'];

 }


   if(isset($_POST['update_page'])){

     $page_title = $_POST['page_title'];
     $page_subtitle = $_POST['page_subtitle'];
     $page_theme = $_POST['page_theme'];
     $page_status = $_POST['page_status'];
     $page_content = $_POST['page_content'];


     }

     $query = "UPDATE pages SET ";
     $query .="page_theme = '{$page_theme}', ";
     $query .="page_title = '{$page_title}', ";
     $query .="page_subtitle = '{$page_subtitle}', ";
     $query .="page_date = now(), ";
     $query .="page_status = '{$page_status}', ";
     $query .="page_content = '{$page_content}' ";
     $query .= "WHERE page_id = {$the_page_id} ";

     $update_page = mysqli_query($connection, $query);

     if(!$update_page) {
       die("Query Failed" . mysqli_error($connection));
     }

     echo "<div class='alert alert-success' role='alert'> Page Updated: " . " " . "<a href='../page.php?page_id={$the_page_id}'>View Page </a> or <a href='pages.php'>Edit More Pages</a> " . "</div>";


?>


<form action="" method="post">

  <div class="form-group">
      <label for="title">Page Title</label>
      <input type="text" class="form-control" name="page_title" value="<?php echo $page_title; ?>">
  </div>

  <div class="form-group">
      <label for="post_category">Page Subtitle</label>
      <input type="text" class="form-control" name="page_subtitle" value="<?php echo $page_subtitle; ?>">
  </div>

  <div class="form-group">
    <label for="page_theme">Choise Theme </label> <br> <i>Actual Theme is <?php echo $page_theme; ?></i>
      <select class="form-control" name="page_theme">

        <option value="<?php echo $page_theme; ?>">Select Value</option>

        <?php

          if($page_theme !== 'main.css') {

            echo "<option value='main.css'>Main</option> ";

          } else {

            echo "<option value='second.css'>Alternative</option>";

          }

        ?>



      </select>
  </div>

  <div class="form-group">
      <label for="page_status">Page Status</label>

      <select class="form-control" name="page_status">
        <option value="<?php echo $page_status; ?>">Select Options</option>
        <option value="published">Published</option>
        <option value="pending">Pending</option>
      </select>

  </div>


  <div class="form-group">
      <label for="page_content">Page Content</label>
      <textarea name="page_content" class="form-control" rows="10" cols="30">
        <?php echo $page_content; ?>
      </textarea>
  </div>

  <div class="form-group">

    <input class="btn btn-primary" type="submit" name="update_page" value="Update Page">

  </div>


</form>
