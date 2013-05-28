<?php

  //frontPage class
  require_once __DIR__.'/classes/frontPage.php';
  //database config
require_once __DIR__.'/classes/config.php';
  
  //set home url to the value defined in the classes/config.php script
   $home_url = HOME;
  
  $id = $_POST['id'];
  $line = $_POST['line'];
  
  if(frontPage::updateMarketLine($id,addslashes($line)))
    {
      echo "The marketing line has been updated successfully.";
      echo "<br/>";
      echo "<a href='".$home_url."'>Go back to home page.</a>";
    }
    else
    {
      echo "The was an error attempting to update the marketing line.";
      echo "<br/>";
      echo "<a href='".$home_url."'>Go back to home page and try again.</a>";
    }
  
 ?>
