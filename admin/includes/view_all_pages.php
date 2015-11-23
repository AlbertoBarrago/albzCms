<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Subtitle</th>
        <th>Theme</th>
        <th>Status</th>
        <th>Page</th>
        <th>Date</th>
        <th>Publish</th>
        <th>Pending</th>
      </tr>
    </thead>
    <tbody>

        <?php

          $query = "SELECT * FROM pages";
          $select_pages = mysqli_query($connection,$query);

          while($row = mysqli_fetch_assoc($select_pages)){
            $page_id = $row['page_id'];
            $page_title = $row['page_title'];
            $page_subtitle = $row['page_subtitle'];
            $page_theme = $row['page_theme'];
            $page_content = $row['page_content'];
            $page_status = $row['page_status'];
            $page_date = $row['page_date'];

            echo "<tr>";
            echo "<td>{$page_id}</td>";
            echo "<td>{$page_title}</td>";
            echo "<td>{$page_subtitle }</td>";
            echo "<td>{$page_theme}</td>";
            echo "<td>{$page_status}</td>";
            $query = "SELECT * FROM pages WHERE page_id = $page_id ";
            $select_post_id_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_post_id_query)){
              $page_id = $row['page_id'];
              $page_title = $row['page_title'];

              echo "<td><a href='../post.php?p_id=$page_id'>{$page_title}</a></td>";

            }
            echo "<td>{$page_date}</td>";
            echo "<td> <a href='pages.php?published=$page_id'>Published</a></td>";
            echo "<td> <a href='pages.php?pending=$page_id'>Pending</a></td>";
            echo "<td> <a href='pages.php?delete=$page_id'>Delete</a></td>";
            echo "</tr>";

          }

          // Change status on Approve status for comment
          if(isset($_GET['published'])){
            $the_page_id = $_GET['published'];

            $query ="UPDATE pages SET page_status = 'published' WHERE page_id = $the_page_id ";
            $published_query = mysqli_query($connection, $query);

            header('Location: pages.php');

          }

          // Change status on Unapprove status for comment
          if(isset($_GET['pending'])){
            $the_page_id = $_GET['pending'];

            $query ="UPDATE pages SET page_status = 'pending' WHERE page_id = $the_page_id ";
            $pending_query = mysqli_query($connection, $query);

            header('Location: pages.php');

          }

          if(isset($_GET['delete'])){
            $the_page_id = $_GET['delete'];

            $query ="DELETE FROM pages WHERE page_id = $the_page_id ";
            $delete_query = mysqli_query($connection, $query);

            header('Location: pages.php');

          }


        ?>

    </tbody>
</table>
