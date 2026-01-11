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
      <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
        <span class="sr-only">0% Complete</span>
      </div>
    </div>
    <h2>Welcome</h2>
    <p>Welcome to the Home Intergrated Library System (HILS) setup. This wizard will help you set up HILS.</p>
    <h2>Prerequisites</h2>
    <p>To set up HILS, you must first ensure you have a working PHP install. By default, HILS uses the SQLite3 database.</p>
    <p>Before continuing, please edit the <code>config.php</code> in the document root. This can be found on your server at <code><?php echo $_SERVER['DOCUMENT_ROOT']; ?></code>.</p>
    <p>The contents of <code>config.php</code> currently look like this. If any of these values are wrong, please edit <code>config.php</code> and refresh this page before continuing.
    <div class="panel panel-default">
      <div class="panel-heading"><code>config.php</code> <button type="button" class="btn btn-default btn-xs" onClick="window.location.href=window.location.href">Refresh</button></div>
      <div class="panel-body">
        <pre class="pre-scrollable"><?php echo htmlspecialchars(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/config.php")); ?></pre>
      </div>
    </div>
    <p>When you are ready to continue, click next.</p>
    <a type="button" class="btn btn-success" href="/setup/step1.php">Next</a>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>
</body>

</html>