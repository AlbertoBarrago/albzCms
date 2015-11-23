<?php

  if(isset($_POST['create_page'])) {

    $page_title = $_POST['page_title'];
    $page_subtitle = $_POST['page_subtitle'];
    $page_date = date('d-m-y');
    $page_theme = $_POST['page_theme'];
    $page_content = $_POST['page_content'];
    $page_status = $_POST['page_status'];


    $query = "INSERT INTO pages(page_title, page_subtitle,  page_date, page_theme, page_content, page_status) ";
    $query .= "VALUES('{$page_title}', '{$page_subtitle}', now(), '{$page_theme}' , '{$page_content}','{$page_status}') ";

    $create_page_query = mysqli_query($connection, $query);

    confirm($create_page_query);


    echo "<div class='alert alert-success' role='alert'> Page Added: " . " " . "<a href='pages.php'>View Page</a> " . "</div>";

  }
?>


<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
      <label for="title">Page Title</label>
      <input type="text" class="form-control" name="page_title">
  </div>

  <div class="form-group">
      <label for="post_category">Page Subtitle</label>
      <input type="text" class="form-control" name="page_subtitle">
  </div>
  <div class="form-group">
    <label for="page_status">Choise Theme</label>
      <select class="form-control" name="page_theme">

        <option value='main.css'>Seleziona Tema</option>
        <option value='main.css'>Main</option>
        <option value='second.css'>Alternative</option>
      </select>
  </div>

  <div class="form-group">
      <label for="page_status">Page Status</label>

      <select class="form-control" name="page_status">
        <option value="pending">Select Options</option>
        <option value="published">Published</option>
        <option value="pending">Pending</option>
      </select>

  </div>


  <div class="form-group">
      <label for="page_content">Page Content</label>
      <textarea name="page_content" class="form-control" rows="10" cols="30"></textarea>
  </div>

  <div class="form-group">

    <input class="btn btn-primary" type="submit" name="create_page" value="Publish Post">

  </div>


</form>
