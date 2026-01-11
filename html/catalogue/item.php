<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/util/setup-test.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/util/session.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/database.php");


if (!(isset($_GET['id']) && $_GET['id'] != "")) {
  header("Location: /catalogue");
}

$starttime = microtime(true);

$jobtime = number_format((microtime(true) - $starttime), 2, ".", ",");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>HILS Catalogue</title>

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

  <?php
  include $_SERVER['DOCUMENT_ROOT'] . "/views/navbar.php";
  ?>


  <div class="container">

    <?php

    try {
      $database = new PDO($dsn);


      $sql = $database->prepare("SELECT * FROM books WHERE book_id = :id");
      $sql->bindParam(':id', $_GET['id'], SQLITE3_INTEGER);
      $sql->execute();
      $book = $sql->fetch(PDO::FETCH_ASSOC);
      echo "<h1>View Record - " . $book['title'] . "</h1>";

      $authorSQL = $database->prepare("SELECT name FROM authors WHERE author_id = :id");
      $authorSQL->bindParam(':id', $book['author']);
      $authorSQL->execute();
      $author = $authorSQL->fetch(PDO::FETCH_ASSOC);

      $locationSQL = $database->prepare("SELECT * FROM locations WHERE location_id = :id");
      $locationSQL->bindParam(':id', $book['location']);
      $locationSQL->execute();
      $location = $locationSQL->fetch(PDO::FETCH_ASSOC);


      echo '<p><strong>Author:</strong> ' . htmlspecialchars($author['name']) . '</p>';
      echo '<p><strong>Location:</strong> ' . htmlspecialchars($location['name']) . ' <small>(' . htmlspecialchars($location['description'] ?? "No description given.") . ')</small></p>';
      echo '<p><strong>Shelfmark:</strong> ' . htmlspecialchars($book['classmark'] ?? "") . '</p>';
      echo '<p><strong>Notes:</strong> ' . htmlspecialchars($book['notes'] ?? "") . '</p>';
      if ($book['disposed'] != null || $book['disposed'] != 0)
        echo '<p class="text-warning"><strong>No longer in collection</strong></p>';

      echo '<p id="control-group"><button id="backbtn" class="hidden btn btn-default" onClick="history.back();">Back</button> <a href="/circulation/checkout.php?id=' . htmlspecialchars($_GET['id']) . '" class="btn btn-primary">Check Out</a></p>';
    } catch (PDOException $e) {
      echo '<p class="text-danger"><strong>Something went wrong...</p>';
      echo '<pre>' . $e->getMessage() . '</pre>';
      echo '<p>Check the manual for help.</p>';
    }

    ?>

    <p><small>Took <?php echo htmlspecialchars($jobtime); ?>s to generate record.</small></p>

  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>

  <!-- Styles to force navbar things -->
  <script>
    document.getElementById('nav_catalogue').classList.add("active");
    if (document.referrer != "") {
        document.getElementById('backbtn').classList.remove('hidden');
    }
  </script>
</body>

</html>