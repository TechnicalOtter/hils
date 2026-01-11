<?php

touch($_SERVER["DOCUMENT_ROOT"]."/setup-complete"); // create a flag to let us know setup is done.

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
      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
        <span class="sr-only">100% Complete</span>
      </div>
    </div>
    <h2>Setup Complete</h2>
    <p>Setup is complete! Congratulations</p>

    <p>You can now log in to add more items or visit the catalogue search page.</p>
    
    <a type="button" class="btn btn-primary" href="/">View Catalogue</a>
    <a type="button" class="btn btn-primary" href="/user/login.php">Log In</a>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>
</body>

</html>