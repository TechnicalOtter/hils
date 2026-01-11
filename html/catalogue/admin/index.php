<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/util/setup-test.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/util/session.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/util/admin-check.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/database.php");

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
    <h1>Catalogue Manager</h1>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Quick Actions</h3>
      </div>
      <div class="panel-body">
        <a href="/catalogue" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search the Catalogue</a>
        <a href="/catalogue/admin/add-book.php" class="btn btn-default"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Add New Book</a>
        <a href="/catalogue/admin/add-author.php" class="btn btn-default"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Add New Author</a>
        <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Add New Location</a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Statistics</h3>
          </div>
          <div class="panel-body">
            <?php
            try {
              $database = new PDO($dsn);
              $sql = $database->prepare("SELECT COUNT(*) FROM books");
              $sql->execute();
              // $count = $sql->fetch(PDO::FETCH_ASSOC);
              $count = $sql->fetchColumn();
              echo "<p>There are ". htmlspecialchars($count) . " books in the catalogue.</p>";

              $sql = $database->prepare("SELECT COUNT(*) FROM authors");
              $sql->execute();
              // $count = $sql->fetch(PDO::FETCH_ASSOC);
              $count = $sql->fetchColumn();
              echo "<p>There are ". htmlspecialchars($count) . " authors in the catalogue.</p>";

              $sql = $database->prepare("SELECT COUNT(*) FROM locations");
              $sql->execute();
              // $count = $sql->fetch(PDO::FETCH_ASSOC);
              $count = $sql->fetchColumn();
              echo "<p>There are ". htmlspecialchars($count) . " locations in the catalogue.</p>";

            } catch (PDOException $e) {
              echo '<p class="text-danger"><strong>Something went wrong...</p>';
              echo '<pre>' . $e->getMessage() . '</pre>';
              echo '<p>Check the manual for help.</p>';
            }
            ?>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Authors</h3>
          </div>
          <div class="panel-body">
            <a href="/catalogue/admin/add-author.php" class="btn btn-default"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Add New Author</a>
            <a href="/catalogue/admin/list-authors.php" class="btn btn-default"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> List Authors</a>
          </div>
        </div>
      </div>
    </div>


  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>

  <!-- Styles to force navbar things -->
  <script>
    document.getElementById('nav_catalogue_manager').classList.add("active");
  </script>
</body>

</html>