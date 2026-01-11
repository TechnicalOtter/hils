<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/util/setup-test.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/util/session.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/database.php");

if($loggedin)
{
  header("Location: /");
}
else
{
  if(isset($_POST['username']) && isset($_POST['password']))
  {
    // do login things
     try {
      $database = new PDO($dsn);

      $sql = $database->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
      $sql->bindParam(':username', $_POST['username'], SQLITE3_TEXT);
      $sql->execute();
      $user = $sql->fetch(PDO::FETCH_ASSOC);

      if(isset($user['password']) && password_verify($_POST['password'],$user['password']))
      {
        // set up session details here
        $_SESSION['user'] = array(
          'id' => $user['user_id'],
          'username' => $user['username'],
          'displayname' => $user['displayname'],
          'auth_level' => $user['auth_level']
        );
        header("Location: /");
      }
      else
      {
        $error = "Login unsuccessful. Check your details are correct and that you are allowed to log in.";
      }

     }
     catch (PDOException $e)
    {
      echo '<p class="text-danger"><strong>Something went wrong...</p>';
      echo '<pre>'.$e->getMessage().'</pre>';
      echo '<p>Check the manual for help.</p>';
    }

  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Log In</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/login.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

    <?php if(isset($error) && $error != ""): ?>

      <div class="container">
        <div class="alert alert-danger">
          <p><strong>Error!</strong></p>
          <p><?php echo htmlspecialchars($error);?></p>
        </div>
      </div>

    <?php endif; ?>

      <form class="form-login" method="post" action="/user/login.php">
        <h2 class="form-login-heading">HILS Log In</h2>
        <label for="username" class="sr-only">Username</label>
        <input name="username" type="text" id="username" class="form-control" placeholder="Username" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input name="password" type="password" id="password" class="form-control" placeholder="correct-horse-battery-staple" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me <span class="help-block">Remember me probably doesn't work right now</span>
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
