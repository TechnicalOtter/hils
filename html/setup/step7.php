<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/database.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>HILS Setup</title>

  <!-- Bootstrap -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="container">
    <h1>HILS Setup</h1>
    <div class="progress">
      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
        <span class="sr-only">90% Complete</span>
      </div>
    </div>
    <h2>Step 5 - Create First Entry</h2>
    <p>Creating first entry...</p>


    <?php
    try {
      $database = new PDO($dsn);
      
      $sql = $database->prepare("INSERT INTO locations (name, description) VALUES (:name, :description)");
      $sql->bindParam(':name', $_POST['loc_name'], SQLITE3_TEXT);
      $sql->bindParam(':description', $_POST['loc_desc'], SQLITE3_TEXT);
      $sql->execute();
      echo "<p>Location created successfully!</p>";

      $sql = null;

      $sql = $database->prepare("INSERT INTO authors (name) VALUES (:name)");
      $sql->bindParam(':name', $_POST['author_name'], SQLITE3_TEXT);
      $sql->execute();
      echo "<p>Author created successfully!</p>";
    
      $sql = null;

      $sql = $database->prepare("SELECT location_id FROM locations WHERE name = :name LIMIT 1");
      $sql->bindParam(':name', $_POST['loc_name'], SQLITE3_TEXT);
      $sql->execute();
      $locid = $sql->fetch(PDO::FETCH_ASSOC)['location_id'];

      $sql = null;

      $sql = $database->prepare("SELECT author_id FROM authors WHERE name = :name LIMIT 1");
      $sql->bindParam(':name', $_POST['author_name'], SQLITE3_TEXT);
      $sql->execute();
      $authid = $sql->fetch(PDO::FETCH_ASSOC)['author_id'];
      
      $sql = null;

      $sql = $database->prepare("INSERT INTO books (title, author, location, classmark, notes) VALUES (:title, :author, :location, :classmark, :notes)");
      $sql->bindParam(':title', $_POST['book_title'], SQLITE3_TEXT);
      $sql->bindParam(':author', $authid, SQLITE3_INTEGER);
      $sql->bindParam(':location', $locid, SQLITE3_INTEGER);
      $sql->bindParam(':classmark', $_POST['book_classmark'], SQLITE3_TEXT);
      $sql->bindParam(':notes', $_POST['book_notes'], SQLITE3_TEXT);
      $sql->execute();
      echo "<p>Book created successfully!</p>";


      echo '<a id="next" type="button" class="btn btn-success" href="/setup/complete.php">Next</a>';
    }
    catch (PDOException $e)
    {
      echo '<p class="text-danger"><strong>Something went wrong...</p>';
      echo '<pre>'.$e->getMessage().'</pre>';
      echo '<p>Check the manual for help.</p>';
    }

    ?>
    
  </div>
  <div class="container" style="height: 100px"></div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>
</body>

</html>