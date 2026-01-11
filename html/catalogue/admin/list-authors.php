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
    <h1>List Authors</h1>
    <div id="data-error-alert" class="alert alert-danger hidden" role="alert"><strong>Something is very wrong with the data recieved from the server.</strong>.<br /> You can check the console for more details.</div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
        </tr>
      </thead>
      <tbody id="author-rows">
      </tbody>
    </table>
    <p class="text-info">These page buttons don't work yet. Todo: Ask the DB for details about the number of authors and do some maths to figure out how many pages we need.</p>
    <nav>
      <ul class="pagination">
        <li>
          <a href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
          <a href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>

  <!-- Styles to force navbar things -->


  <script>
    /*
     * This script is to do the pagination and requesting stuff.
     */

    $.get("/catalogue/admin/workers/list-author-paginator.php", function(data) {
      console.info("Data Loaded: " + data);
      data = JSON.parse(data);
      if (Array.isArray(data)) {
        console.info("Is good");
        data.forEach(author => {
          $("#author-rows").append(`<tr><td>${author.author_id}</td><td>${author.name}</td></tr>`);
        });
      } else {
        $("#data-error-alert").removeClass("hidden");
        console.error("Returned data is treif! It's not an array. It is a", typeof(data));
      }
    });
  </script>



</body>

</html>