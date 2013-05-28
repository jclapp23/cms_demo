<?php

  //services class
require_once __DIR__.'/classes/services.php';
//database config
require_once __DIR__.'/classes/config.php';

//set home url to the value defined in the classes/config.php script
$home_url = HOME;
  
  $id = $_POST['id'];
  $title = $_POST['title'];
  $short_title = $_POST['short_title'];
  
  if(services::updateService($id,addslashes($title),addslashes($short_title)))
    {
      echo "The service has been updated successfully.";
      echo "<br/>";
      echo "<a href='".$home_url."new-hampshire-stone-mason-services/'>Go back to services page.</a>";
    }
    else
    {
      echo "The was an error attempting to update the service.";
      echo "<br/>";
      echo "<a href='".$home_url."new-hampshire-stone-mason-services/'>Go back to services page and try again.</a>";
    }
  
 ?>
