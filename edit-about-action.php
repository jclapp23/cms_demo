<?php

  //frontPage
  require_once __DIR__.'/classes/frontPage.php';
  //database config
require_once __DIR__.'/classes/config.php';

  //set home url to the value defined in the classes/config.php script
  $home_url = HOME;
  
  $id = $_POST['id'];
  $paragraph = $_POST['paragraph'];
  
  if(frontPage::updateAboutParagraph($id,addslashes($paragraph)))
    {
      echo "The paragraph has been updated successfully.";
      echo "<br/>";
      echo "<a href='".$home_url."'>Go back to home page.</a>";
    }
    else
    {
      echo "The was an error attempting to update the paragraph.";
      echo "<br/>";
      echo "<a href='".$home_url."'>Go back to home page and try again.</a>";
    }
  
 ?>
