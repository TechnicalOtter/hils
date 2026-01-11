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
      <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
        <span class="sr-only">80% Complete</span>
      </div>
    </div>
    <h2>Step 5 - Create First Entry</h2>
    <p>It's now time to create the first entry. Data in HILS is stuctured in the following way.</p>
    <p>Take a look at the following examples, and fill out the forms along the way:</p>

    <form method="post" action="/setup/step7.php">
    <div class="row">
      <div class="col-md-6">
        <h2>Locations</h2>
        <p>Locations are the physical, real world, locations of books. They are a text string that describes a location.</p>
        <div class="form-group">
          <label for="loc_name">Name</label>
          <input name="loc_name" type="text" class="form-control" id="loc_name" placeholder="Attic Shelf 1">
        </div>
        <div class="form-group">
          <label for="loc_desc">Description</label>
          <input name="loc_desc" type="text" class="form-control" id="loc_desc" placeholder="The first shelf in the attic, by the hatch.">
        </div>
      </div>


      <div class="col-md-6">
        <h2>Authors</h2>
        <p>Authors exist within their own world. They are just simple text strings that can be assigned to multiple books.</p>
        <div class="form-group">
          <label for="author_name">Author's Name</label>
          <input name="author_name" type="text" class="form-control" id="loc_name" placeholder="Douglas Adams">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <h2>Books</h2>
        <p>Books exist within locations. They also have authors. Each book's entry doesn't store these values directly, instead it references the author and location ID's in the respective tables. This allows for corrections to be made in spelling etc. over time.</p>
        
        
        <div class="form-group">
          <label for="book_title">Title</label>
          <input name="book_title" type="text" class="form-control" id="book_title" placeholder="The Hitchikers Guide To The Galaxy">
        </div>

        <div class="form-group">
          <label for="book_classmark">Classmark</label>
          <p class="help-block">This is the little tags you find in big libraries that help you locate books on a shelf. You don't need them, but they can be helpful!</p>
          <input name="book_classmark" type="text" class="form-control" id="book_classmark" placeholder="YK.1991.a.9529">
        </div>

        <div class="form-group">
          <label for="book_notes">Notes</label>
          <p class="help-block">This is the little tags you find in big libraries that help you locate books on a shelf. You don't need them, but they can be helpful!</p>
          <textarea name="book_notes" id="book_notes" class="form-control" rows="3" placeholder="A great book about Life, The Universe and Everything.""></textarea>
        </div>


      </div>
    </div>
  
    <button type="reset" class="btn btn-warning">Clear Form</button>
    <button type="submit" class="btn btn-success">Add first entries to library</button>
    </form>
  </div>
  <div class="container" style="height: 100px"></div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>
</body>

</html>