<?php 

if(!$loggedin || $_SESSION['user']['auth_level'] != 0)
{
  header("Location: /?noauth");
}

?>