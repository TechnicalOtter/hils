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
  <title>HILS</title>

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

<?php if(isset($_GET['noauth'])): ?>
  
<div class="container alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Not authenticated!</strong> You do not have permission to access that page! Please try again <a href="/user/login.php">logged in to the correct account.</a>
</div>

<?php endif; ?>

  <div class="container">
    <div class="jumbotron">
      <h1>Welcome to HILS.</h1>
      <p>Your home library has never been easier to manage and interact with!</p>
      <form class="" role="search"  action="/catalogue/search.php" method="get">
          <div class="form-group">
            <input name="query" type="text" class="form-control input-lg" placeholder="Search the catalogue">
          </div>
          <button type="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
        </form>
      <!-- <p><a class="btn btn-primary btn-lg" href="/user/login.php" role="button">Log In</a></p> -->
    </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>
  
  <!-- Styles to force navbar things -->
   <script>
    document.getElementById('nav_home').classList.add("active");
   </script>
</body>

</html>