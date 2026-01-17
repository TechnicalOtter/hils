<?php
// This will treat 0 and 1 for $_GET['page'] the same...

require_once($_SERVER['DOCUMENT_ROOT'] . "/util/setup-test.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/util/session.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/util/admin-check.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/database.php");

try {
  
  if(isset($_GET['page']))
  {
    $page = htmlspecialchars($_GET['page']);  // Page Number (never trust input)
  }
  else
  {
    $page = 0;
  }

  $limit = 9;  // limit to 10 authors
  $offset = ($page - 1) * $limit;
  $database = new PDO($dsn);
  $sql = $database->prepare("SELECT author_id, name FROM authors ORDER BY 'name' ASC LIMIT :limit OFFSET :offset");
  $sql->bindParam(':limit', $limit, SQLITE3_NUM);
  $sql->bindParam(':offset', $offset, SQLITE3_NUM);

  $sql->execute();
  
  echo json_encode($sql->fetchAll());
  
} catch (PDOException $e) {
  echo $e->getMessage();
}


?>