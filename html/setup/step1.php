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
      <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
        <span class="sr-only">10% Complete</span>
      </div>
    </div>
    <h2>Step 1 - Database</h2>
    <p>The skeletal database will now be created.</p>
    <p>This includes the basic tables for users, authors, books, etc.</p>
    

    <p>To create the database, click Create Database</p>
    <a type="button" class="btn btn-default" href="/setup/index.php">Back</a>
    <a type="button" class="btn btn-success" href="/setup/step2.php">Create Database</a>
    

    <!-- End of page buttons -->
    <!-- <p>When you are ready to continue, click next.</p>
    <a type="button" class="btn btn-primary" href="/step1.php">Next</a> -->
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>
</body>

</html>