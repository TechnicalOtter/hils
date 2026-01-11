<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/util/setup-test.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/util/session.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/database.php");


if (!(isset($_GET['query']) && $_GET['query'] != "")) {
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
    <h1>Search The Catalogue</h1>
    <p><strong>Searching for</strong> <?php echo htmlspecialchars($_GET['query']); ?></p>
    <form class="" role="search" action="/catalogue/search.php" method="get">
      <div class="form-group">
        <input name="query" type="text" class="form-control" placeholder="Search the catalogue" value="<?php echo htmlspecialchars($_GET['query']); ?>">
      </div>
      <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
    </form>
  </div>

  <br />

  <div class="container">
    
  <?php 

   try {
      $database = new PDO($dsn);
      
      $title = "%" . $_GET['query'] . "%"; // add wildcards for search

      $sql = $database->prepare("SELECT * FROM books WHERE title LIKE :title");
      $sql->bindParam(':title', $title, SQLITE3_TEXT);
      $sql->execute();

      $i=0;
      while ($book = $sql->fetch(PDO::FETCH_ASSOC))
      {
        $i++;
        $authorSQL = $database->prepare("SELECT name FROM authors WHERE author_id = :id");
        $authorSQL->bindParam(':id', $book['author']);
        $authorSQL->execute();
        $author = $authorSQL->fetch(PDO::FETCH_ASSOC);

        $locationSQL = $database->prepare("SELECT * FROM locations WHERE location_id = :id");
        $locationSQL->bindParam(':id', $book['location']);
        $locationSQL->execute();
        $location = $locationSQL->fetch(PDO::FETCH_ASSOC);

        echo '<div class="panel panel-default"><div class="panel-heading">';
        echo '<h3 class="panel-title">'. htmlspecialchars($book['title']) .'</h3>';
        echo '</div><div class="panel-body">';
        echo '<p><strong>Author:</strong> ' . htmlspecialchars($author['name']) . '</p>';
        echo '<p><strong>Location:</strong><span data-toggle="tooltip" title="' . htmlspecialchars($location['description'] ?? "No description given.") . '"> ' . htmlspecialchars($location['name']) . '</span></p>';
        if($book['classmark'] != null || $book['classmark'] != "")
          echo '<p><strong>Shelfmark:</strong> ' . htmlspecialchars($book['classmark']) . '</p>';
        // if($book['notes'] != null || $book['notes'] != "")
        //   echo '<p><strong>Notes:</strong> ' . htmlspecialchars($book['notes']) . '</p>';
        if($book['disposed'] != null || $book['disposed'] != 0)
          echo '<p class="text-warning"><strong>No longer in collection</strong></p>';
        echo '<a href="/catalogue/item.php?id=' . $book['book_id'] . '" type="button" class="btn btn-default">View Full Record</a> <a href="/circulation/checkout.php?id=' . htmlspecialchars($book['book_id']) . '"  type="button" class="btn btn-primary">Check Out</a>';
        echo '</div></div>';
      }
     

     }
     catch (PDOException $e)
    {
      echo '<p class="text-danger"><strong>Something went wrong...</p>';
      echo '<pre>'.$e->getMessage().'</pre>';
      echo '<p>Check the manual for help.</p>';
    }

  ?>

  <p><small>Found <?php echo htmlspecialchars($i);?> items in <?php echo htmlspecialchars($jobtime); ?>s.</small></p>
   
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>

  <!-- Styles to force navbar things -->
  <script>
    document.getElementById('nav_catalogue').classList.add("active");
  // initilise tooltips
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
</body>

</html>