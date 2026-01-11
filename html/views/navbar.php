<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="/">HILS</a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li id="nav_home"><a href="/">Home</a></li>
        <li id="nav_catalogue"><a href="/catalogue">Catalogue</a></li>
        <?php if ($loggedin && $_SESSION['user']['auth_level'] == 0): ?>
          <li id="nav_catalogue_manager"><a href="/catalogue/admin">Catalogue Manager</a></li>
          <li><a href="/admin/">Circulation</a></li>
          <li><a href="/admin/">Administration</a></li>
        <?php endif; ?>
      </ul>


      <ul class="nav navbar-nav navbar-right">

        <form class="navbar-form navbar-left" role="search"  action="/catalogue/search.php" method="get">
          <div class="form-group">
            <input type="text" name="query" class="form-control" placeholder="Search Catalogue">
          </div>
          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
        </form>

        <?php if ($loggedin): ?>


          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user']['displayname']; ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/user/">User Page</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/user/logout.php">Log out</a></li>
            </ul>
          </li>

        <?php else: ?>
          <li><a href="/user/login.php">Log In</a></li>
        <?php endif; ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>