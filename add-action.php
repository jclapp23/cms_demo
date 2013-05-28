<?php

   //portfolio item class
  require_once __DIR__.'/classes/portfolio_item.php';
  //thumbnailCreator class
  require_once __DIR__.'/classes/thumbnailCreator.php';
  //database config
require_once __DIR__.'/classes/config.php';

  //set home url to the value defined in the classes/config.php script
  $home_url = HOME;

   //This is the directory where images will be saved 
   $target = "images/"; 
   $target1 = $target . basename( $_FILES['image_1']['name']); 
   $target2 = $target . basename( $_FILES['image_2']['name']); 
   $target3 = $target . basename( $_FILES['image_3']['name']); 
   $target4 = $target . basename( $_FILES['image_4']['name']); 
   $target5 = $target . basename( $_FILES['image_5']['name']); 
   $target6 = $target . basename( $_FILES['image_6']['name']); 
   $target_array = array($target1,$target2,$target3,$target4,$target5,$target6);
   
   //if an image field is blank in the form, remove it from target directory array;
   
   $target_counter=0;
   foreach($target_array as $target){
       if ($target == "images/")
        unset($target_array[$target_counter]);
       $target_counter++;
     }

  //save post variables

  $service_keyword = $_POST['service'];
  $portfolio_description = addslashes($_POST['portfolio_description']);
  $project_date = $_POST['project_date'];
  
   //if an image field is blank in the form, remove it from image location array:

  $image_location_array = array($_FILES['image_1']['name'],$_FILES['image_2']['name'],$_FILES['image_3']['name'],$_FILES['image_4']['name'],$_FILES['image_5']['name'],$_FILES['image_6']['name']);
  
   $image_counter=0;
   foreach($image_location_array as $image_location){
       if ($image_location == "")
        unset($image_location_array[$image_counter]);
       $image_counter++;
     }
  
  //add new item to portfolio table and return newly created project id
  
  $project_id = portfolio_item::addNewPortfolioItem($service_keyword,$portfolio_description,$project_date);
  
  //add images for newly created project_id;
  
  foreach($image_location_array as $image_location)
    {
      portfolio_item::addImageForNewItem($image_location,$project_id);  
    }
  
  $error = false;
  $count = 0;
  
  //upload each image to the server
  
  foreach($target_array as $target)
    {
      $count++;  
    
    if(!(move_uploaded_file($_FILES['image_'.$count.'']['tmp_name'], $target))){
        $error = true;
        };
    }
      
      if($error == false)
      {   
         foreach($image_location_array as $image_location)
        { 
         
          thumbnailCreator::createthumb("images/".$image_location,"images/thumb-".$image_location,270,270);
        }
    
         echo "The portfolio item has been added successfully.";
         echo "<br/>";
         echo "<a href='".$home_url."prior-stone-masonry-project-portfolio/'>Go back to portfolio.</a>";
         echo "<br/>";
         echo "<a href='".$home_url."add/'>Go back to add another item.</a>";
       } 
        else 
       { 
         //Gives an error if its not 
         echo "Sorry, there was a problem uploading your file."; 
        echo "<br/>";
        echo "<a href='".$home_url."add/'>Go back and try again</a>";
       } 

?>
