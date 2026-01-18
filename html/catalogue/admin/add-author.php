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
  if (!isset($_GET['popup']))
    include $_SERVER['DOCUMENT_ROOT'] . "/views/navbar.php";
  ?>

  <?php
  $returnedAuthor=[0,""];
  if (isset($_POST['name'])) {
    // create author
    try {
      $database = new PDO($dsn);
       $sql = $database->prepare("INSERT INTO authors (name) VALUES (:name)");
      $sql->bindParam(':name', $_POST['name'], SQLITE3_TEXT);
      $sql->execute();

      
      $sql = $database->prepare("SELECT * FROM authors WHERE name = :name LIMIT 1");
      $sql->bindParam(':name', $_POST['name'], SQLITE3_TEXT);
      $sql->execute();
      $returnedAuthor = $sql->fetch(PDO::FETCH_ASSOC);
      echo '<div class="container alert alert-success" role="alert">Successfully added author ' . htmlspecialchars($_POST['name']) . '</div>';
    } catch (PDOException $e) {
      echo '<p class="text-danger"><strong>Something went wrong...</p>';
      echo '<pre>' . $e->getMessage() . '</pre>';
      echo '<p>Check the manual for help.</p>';
    }
    
  }

  ?>

  <div class="container">
    <h1>Add Author</h1>

    <form id="create_author_form" method="post" action="/catalogue/admin/add-author.php<?php if(isset($_GET['popup'])){echo "?popup";}?>">
      <div class="form-group">
        <label for="name">Author's Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Robin Ince">
      </div>
      <input type="checkbox" class="hidden" <?php if (isset($_GET['popup'])) {
                                              echo "checked";
                                            } ?> name="ispopup">
      <?php if(isset($_GET['popup'])){echo '<button class="btn btn-default" onclick="updateParent()">Close</button>'; }?>                                     
      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Author</button>
    </form>


  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>

  <!-- Styles to force navbar things -->
  <script>
    document.getElementById('nav_catalogue_manager').classList.add("active");

    function updateParent()
    {
      <?php if(!isset($returnedAuthor['author_id'])){ $returnedAuthor['author_id'] = 0; $returnedAuthor['name'] = "Unknown";} ?>
      window.opener.updateAuthors(<?php echo htmlspecialchars($returnedAuthor['author_id']); ?>,"<?php echo htmlspecialchars($returnedAuthor['name']);?>");
    }
  </script>
</body>

</html>