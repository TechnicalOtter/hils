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
      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
        <span class="sr-only">60% Complete</span>
      </div>
    </div>
    <h2>Step 5 - Initial data</h2>
    <p>Would you like to create a location and add a book to the location?</p>
    <p>Doing this now will make your life much easier!</p>
    
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#warningModal">No</button>
    <a type="button" class="btn btn-success" href="/setup/step6.php">Yes, create the first entry</a>
    

    <!-- End of page buttons -->
    <!-- <p>When you are ready to continue, click next.</p>
    <a type="button" class="btn btn-primary" href="/step1.php">Next</a> -->
  </div>


  <div class="modal fade" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="warningModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title text-danger" id="warningModalLabel">Warning!</h4>
      </div>
      <div class="modal-body">
        <p>Not creating this data now <span class="text-danger">may result in unexpected behaviour</span>. You really should create your first data in this setup wizard!</p>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-danger" data-dismiss="modal" href="/setup/complete.php">Skip</a>
        <a type="button" class="btn btn-success" href="/setup/step6.php">Create first data</a>
      </div>
    </div>
  </div>
</div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>
</body>

</html>