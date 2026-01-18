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
    <h1>Add Book</h1>

    <form id="create_author_form" method="post" action="/catalogue/admin/add-book.php">
      <div class="form-group">
        <label for="book_title">Title</label>
        <input name="book_title" type="text" class="form-control" id="book_title" placeholder="The Hitchikers Guide To The Galaxy">

      </div>

      <div class="form-group">
        <label for="book_author">Author</label>
        <div class="input-group">
          <select class="form-control" id="book_author" name="book_author">
            <?php 
            //select all authors from the DB and  write them as <options>
            $database = new PDO($dsn);
            $sql = $database->prepare("SELECT author_id, name FROM authors ORDER BY 'name' ASC");
            $sql->execute();
            $authors = $sql->fetchAll();
            foreach ($authors as $author) {
              echo "<option value='". $author['author_id'] ."'>" . $author['name'] . "</option>";
            }
            ?>
          </select>
          <span class="input-group-btn"><button type="button" class="btn btn-default" onclick="addAuthorBtn()">Add Author</button></span>
        </div>
      </div>
      <div class="form-group">
        <label for="book_location">Location</label>
        <div class="input-group">
          <select class="form-control" name="book_location">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>

          </select>
          <span class="input-group-btn"><button type="button" class="btn btn-default">Add Location</button></span>
        </div>

      </div>

      <div class="form-group">
        <label for="book_classmark">Classmark</label>
        <p class="help-block">This is the little tags you find in big libraries that help you locate books on a shelf. You don't need them, but they can be helpful!</p>
        <input name="book_classmark" type="text" class="form-control" id="book_classmark" placeholder="YK.1991.a.9529">
      </div>

      <div class="form-group">
        <label for="book_notes">Notes</label>
        <p class="help-block">You can put any notes about the book here.</p>
        <textarea name="book_notes" id="book_notes" class="form-control" rows="3" placeholder="A great book about Life, The Universe and Everything.""></textarea>
        </div>
      <button type=" submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Book</button>
    </form>


  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>

  <!-- Styles to force navbar things -->
  <script>
    document.getElementById('nav_catalogue_manager').classList.add("active");

    var authorsWindow;
    function addAuthorBtn()
    {
        var params = 'scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=640,height=300';
       authorsWindow = window.open("/catalogue/admin/add-author.php?popup", 'Add Author', params); 
    }

    function updateAuthors(authorID, authorName)
    {
      authorsWindow.close();
      // alert("updateAuthors() " + authorID + authorName);
      $('#book_author').append($('<option>', { value: authorID, text: authorName}));
      $('#book_author').val(authorID);
    }
  </script>
</body>

</html>