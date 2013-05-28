<?php

    //services class
  require_once __DIR__.'/classes/services.php';
  //database config
require_once __DIR__.'/classes/config.php';

  //set home url to the value defined in the classes/config.php script
  $home_url = HOME;
  
  $title = $_POST['title'];
  $short_title = $_POST['short_title'];
  $service_id = $_POST['service_id'];

  if(services::addSubService(addslashes($title),addslashes($short_title),$service_id))
    {
      echo "The sub service has been added successfully.";
      echo "<br/>";
      echo "<a href='".$home_url."'/new-hampshire-stone-mason-services/'>Go back to services page.</a>";
    }
    else
    {
      echo "The was an error attempting to add the sub service.";
      echo "<br/>";
      echo "<a href='".$home_url."'/new-hampshire-stone-mason-services/'>Go back to services page and try again or contact webmaster.</a>";
    }
  
 ?>