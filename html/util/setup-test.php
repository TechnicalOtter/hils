<?php

if(!file_exists($_SERVER["DOCUMENT_ROOT"]."/setup-complete"))
{
  echo "Setup is not complete.";
  header("Location: /setup");
}


?>