<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/database.php');

$name = $_POST['name'];
$user = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
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
      <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
        <span class="sr-only">50% Complete</span>
      </div>
    </div>
    <h2>Step 4 - Creating Admin User</h2>
    <?php

try {
  $database = new PDO($dsn);
  $sql = $database->prepare("INSERT INTO users (auth_level, username, displayname, is_only_patron, password) VALUES (0, :username, :displayname, 0, :password)");
  $sql->bindParam(':username', $user, SQLITE3_TEXT);
  $sql->bindParam(':displayname', $name, SQLITE3_TEXT);
  $sql->bindParam(':password', $password, SQLITE3_TEXT);
  $sql->execute();
  echo "<p>User created successfully!</p>";
  echo '<a id="next" type="button" class="btn btn-success" href="/setup/step5.php">Next</a>';
}
catch (PDOException $e)
{
  echo '<p class="text-danger"><strong>Something went wrong...</p>';
  echo '<pre>'.$e->getMessage().'</pre>';
  echo '<p>Check the manual for help.</p>';
}

    ?>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>
</body>

</html>