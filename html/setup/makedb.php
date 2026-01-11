<?php
header('Content-Type: text/event-stream');
// recommended to prevent caching of event data.
header('Cache-Control: no-cache'); 


require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/database.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/util/sql_file_helper.php');


$sql_parser = new SQLParser();

function send_message($id, $message, $progress) {
    $d = array('message' => $message , 'progress' => $progress);
     
    echo "id: $id" . PHP_EOL;
    echo "data: " . json_encode($d) . PHP_EOL;
    echo PHP_EOL;
     
    ob_flush();
    flush();
}

try {
  send_message('e', $dsn, 1);
  $database = new PDO($dsn);
  send_message('connected', "Connected to Database.", "0");
  
  send_message('dataload', 'Loading data to be inserted...', "30");

  $queries = $sql_parser->parse_file('./database.sql');
  
  $i=1;
  foreach ($queries as $query) {
    send_message($i, "Running query:\n". htmlspecialchars($query), 30+($i));
    $q = $database->prepare($query);
    $q->execute();
    $i++;
  }
  
  
  // $sql = file_get_contents('./database.sql');
  // send_message('data', htmlspecialchars($sql), "45");

  // send_message('inserting', 'Preparing data..', "40");
  
  // $query = $database->prepare($sql);
  // send_message('inserting', 'Inserting data..', "60");
  
  // $query->execute();
  send_message('finishing', 'Finishing up...', "90");
  
} catch (PDOException $e)
{
  send_message('ERROR', $e->getMessage(), "0");
}
 
send_message('CLOSE', 'Database created!', '100');
?>