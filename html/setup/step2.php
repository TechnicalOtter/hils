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
      <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
        <span class="sr-only">20% Complete</span>
      </div>
    </div>
    <h2>Creating Database</h2>
    <p>The database is being created. Please wait...</p>

    <div class="progress">
      <div id="dbprogress" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 00%;">
        <span class="sr-only">0% Complete</span>
      </div>
    </div>

    <div class="alert alert-danger hidden" id="errorbanner" role="alert">
      <h1>There was an error</h1>
      <span id="errortext"></span>
    </div>

    <pre id="console"></pre>


<!-- <p>To create the database, click Create Database</p> -->
    <!-- <a type="button" class="btn btn-default" href="/setup/index.php">Back</a> -->
    <a id="next" type="button" class="hidden btn btn-success" href="/setup/step3.php">Next</a>


    <!-- End of page buttons -->
    <!-- <p>When you are ready to continue, click next.</p>
    <a type="button" class="btn btn-primary" href="/step1.php">Next</a> -->
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>


  <script>

  var es;
  
  function startTask() {
      es = new EventSource('makedb.php');
      
      //a message is received
      es.addEventListener('message', function(e) {
          var result = JSON.parse( e.data );
          
          addLog(result.message);       
          
          if(e.lastEventId == 'CLOSE') {
              es.close();
              var pBar = document.getElementById('dbprogress');
              pBar.style ="width: 100%;"; //max out the progress bar
              var nextbtn = document.getElementById('next');
              nextbtn.classList.remove('hidden');
          }
          else if(e.lastEventId == 'ERROR')
          {
            es.close();
            var pBar = document.getElementById('dbprogress');
              pBar.style ="width: 100%;"; //max out the progress bar
            var errorbanner = document.getElementById("errorbanner");
            errorbanner.classList.remove('hidden');
            var errortext = document.getElementById("errortext");
            errortext.innerText = result.message;
            
              // var nextbtn = document.getElementById('next');
              // nextbtn.classList.remove('hidden');
          }
          else {
              var perc = document.getElementById('dbprogress');
              // perc.style   = result.progress  + "%";
              perc.style = 'width: ' + result.progress + '%;';
          }
      });
      
      es.addEventListener('error', function(e) {
          addLog('Error occurred');
          es.close();
      });
  }
  
  function stopTask() {
      es.close();
      addLog('Interrupted');
  }
  
  function addLog(message) {
      var r = document.getElementById('console');
      r.innerHTML += message + '<br>';
      r.scrollTop = r.scrollHeight;
  }

 startTask();
  </script>
</body>

</html>