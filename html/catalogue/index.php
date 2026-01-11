<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/util/setup-test.php");

require_once($_SERVER['DOCUMENT_ROOT'] . "/util/session.php");

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
    <div class="jumbotron">
      <h1>Search The Catalogue</h1>
      <p>Conduct a simple search of the catalogue.</p>
      <form class="" role="search" action="/catalogue/search.php" method="get">
        <div class="form-group">
          <input name="query" type="text" class="form-control input-lg" placeholder="Search the catalogue">
        </div>
        <button type="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
      </form>
    </div>
  </div>

  <div class="container" id="advanced_search">
    <h1>Advanced Search</h1>
    <form role="search">
      <div class="form-group">
        <label for="book_title">Title</label>
        <input name="book_title" type="text" class="form-control" placeholder="Chernobyl: History of a tragedy">
      </div>
      <div class="form-group">
        <label for="book_author">Author</label>
        <input name="book_author" type="text" class="form-control" placeholder="Serhii Plokhy">
      </div>
      <div class="form-group">
        <label for="book_classmark">Class Mark</label>
        <input name="book_classmark" type="text" class="form-control" placeholder="880.200.43 Plo">
      </div>
      <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
    </form>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>

  <!-- Styles to force navbar things -->
  <script>
    document.getElementById('nav_catalogue').classList.add("active");
  </script>
</body>

</html>