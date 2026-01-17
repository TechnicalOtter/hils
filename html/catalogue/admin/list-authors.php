<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/util/setup-test.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/util/session.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/util/admin-check.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/database.php");

$author_count = 0;
$pages = 0;
// TODO: On load, get number of rows in author table
// Then use that to calculate pages.
try {
  $database = new PDO($dsn);
  $sql = $database->prepare("SELECT COUNT(author_id) as count FROM authors"); // Count the number of authors
  $sql->execute();

  $author_count = $sql->fetchColumn();
  $pages = ceil($author_count / 10);
} catch (PDOException $e) {
  echo $e->getMessage();
}
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
    <p class="text-info">Authors in database: <?php echo $author_count; ?> </p>
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
    <nav class="text-center">
      <ul class="pagination">
        <li id="paginator-previous" class="disabled">
          <a href="#" aria-label="Previous" onclick="flip_page(true)">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php
        // start from 1 because the page thing counts from 1...
        // also humans count from 1...
        for ($i = 1; $i <= $pages; $i++) {
          echo '<li class="paginator"><a href="#" onclick="getPage(' . $i . ')">' . $i . '</a></li>';
        }
        ?>
        <li id="paginator-next">
          <a href="#" aria-label="Next" onclick="flip_page(false)">
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
    //start from 1 bc page worker.
    var current_page = 1;
    var page_count = <?php echo $pages; ?>;
    /*
     * This script is to do the pagination and requesting stuff.
     */

    //flips the page with the prev/next buttons. there's probably a better way to do this...

    function flip_page(backwards) {
      if (backwards && current_page > 1) {
        current_page--;
        getPage(current_page);
      } else if (current_page < page_count) //this is probably bad/cursed.
      {
        current_page++;
        getPage(current_page);
      } else {
        //do nout;
        console.info("Pages is maxed/minimum-ed.");
      }
      updatePaginatorFlippers();

    }


    //gets table data and renders it
    function getPage(page_number) {
      if (isNaN(page_number) || page_number === 0)
        page_number = 1; // if we don't know what page is wanted, just make it page 1.
      var get_string = `/catalogue/admin/workers/list-author-paginator.php?page=${page_number}`;
      $.get(get_string, function(data) {
        console.info("Data Loaded: " + data);
        data = JSON.parse(data);
        if (Array.isArray(data)) {
          $("#author-rows").empty();
          current_page = page_number;
          $('.paginator').removeClass('active');
          $('.paginator').eq(page_number - 1).addClass('active');
          updatePaginatorFlippers();
          data.forEach(author => {
            $("#author-rows").append(`<tr><td>${author.author_id}</td><td>${author.name}</td></tr>`);
          });
        } else {
          $("#data-error-alert").removeClass("hidden");
          console.error("Returned data is treif! It's not an array. It is a", typeof(data));
        }
      });
    }


    // this fn is probably super inefficient...
    // enables or disables the next previous page buttons...
    function updatePaginatorFlippers() {
      if (current_page === 1)
        $('#paginator-previous').addClass('disabled');
      else
        $('#paginator-previous').removeClass('disabled');

      if (current_page === page_count)
        $('#paginator-next').addClass('disabled');
      else
        $('#paginator-next').removeClass('disabled');
    }


    getPage(0); //see the woker page but it starts at 1. Page 0 = page 1.
  </script>



</body>

</html>