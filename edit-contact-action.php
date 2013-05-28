<?php

 //manageContent class
  require_once __DIR__.'/classes/manageContent.php';
  //database config
require_once __DIR__.'/classes/config.php';

  //set home url to the value defined in the classes/config.php script
  $home_url = HOME;
  
  $page_id = $_POST['id'];
  $content = $_POST['content'];
  
  if(manageContent::updateHtmlBox($page_id,addslashes($content)))
    {
      echo "The content has been updated successfully.";
      echo "<br/>";
      echo "<a href='".$home_url."new-hampshire-stone-mason-contact/'>Go back to contact page.</a>";
    }
    else
    {
      echo "The was an error attempting to update the content.";
      echo "<br/>";
      echo "<a href='".$home_url."new-hampshire-stone-mason-contact/'>Go back to contact page and try again.</a>";
    }
  
 ?>
