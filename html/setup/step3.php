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
      <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
        <span class="sr-only">40% Complete</span>
      </div>
    </div>
    <h2>Step 3 - Admin User</h2>
    <p>Please create the first admin user.</p>
    <p>This user will be able to manage the library, not just view it.</p>
  
  <form method="post" action="/setup/step4.php">
  <div class="form-group">
    <label for="name">Name</label>
    <p class="help-block">What's the admin's name?</p>
    <input name="name" type="text" class="form-control" id="name" placeholder="Amelia Noceda">
  </div>
  <div class="form-group">
    <label for="username">User Name</label>
    <p class="help-block">What will be the username they use to log in?</p>
    <input name="username" type="text" class="form-control" id="username" placeholder="amelia">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <p class="help-block">What's their password? <a href="https://xkcd.com/936/" target="_blank">Need some ideas?</a></p>
    <p class="help-block">Please <a href="/setup/dbnotes.html" target="_blank">read these notes about the security of the database</a>.</p>
    <input name="password" type="password" class="form-control" id="password" placeholder="correct-horse-battery-staple">
  </div>
  <button type="reset" class="btn btn-danger">Reset Form</button>
  <button type="submit" class="btn btn-success">Create User</button>
</form>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>
</body>

</html>