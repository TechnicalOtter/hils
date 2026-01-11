<?php
session_start();

$loggedin;
if(isset($_SESSION['user']) && $_SESSION['user'] != "")
{
  $loggedin = true;
}
else
{
  $loggedin = false;
}

?>