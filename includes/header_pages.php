<?php session_start(); ?>
<?php ob_start(); ?>


<?php

  if(isset($_GET['page_id'])){

    $the_page_id = $_GET['page_id'];

  }

  $query = "SELECT * FROM pages WHERE page_id = $the_page_id ";
  $query_select_page = mysqli_query($connection,$query);

  while($row= mysqli_fetch_array($query_select_page)) {

      $page_theme = $row['page_theme'];

  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Alberto Barrago | alBlogz">
    <meta name="author" content="Alberto Barrago">

    <link rel="shortcut icon" type="image/png" href="images/favicon.ico"/>

    <title>alBz | Personal Blog </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/<?php echo $page_theme; ?>"  rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- fontAwesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body>
