<?php

//PDO helper class
require_once __DIR__.'/Database.php';

class frontPage{
 
  // set home url to constant value defined in class/config.php   
  public static $home_url = HOME;
  
  //function displays html formatted about paragraphs on front page
  static public function listAboutParagraphs()
  {  
    $db = new Database();    

    //no PDO paramaters needed - leave as empty array
    $params = array();

    //build PDO query to select all about paragraphs
    $query = "SELECT * FROM about_paragraphs";

    //fetch row from array 
    $result = $db->fetchAll($query, $params);

    //iterate through each row returned and display paragraphs with content
    foreach($result as $row){
      echo '<p>';
      echo $paragraph = $row->paragraph;
      echo '</p>';
      //if an admin is logged in, display content management icons
      if( $user_id = security::get_user_id() ){  
        echo '<a href="'.self::$home_url.'edit-about/?id='.$row->id.'"><img class="icon" src="'.self::$home_url.'images/pencil.jpg" title="edit paragraph" alt="edit paragraph icon"/></a>';
        echo '<a class="delete" href="'.self::$home_url.'home/?paragraph_id='.$row->id.'"><img class="icon" src="'.self::$home_url.'images/delete.jpg" title="delete paragraph" alt="delete paragraph icon"/></a>';
      };
    };
    
   }
  
   //function returns content of about paragraph from the database based on id
   static public function getAboutParagraph($id)
    {  
    $db = new Database();    

    //pass paragraph id arguement into PDO params array
    $params = array('id'=>$id);

    //build query to select single paragraph from database
    $query = "SELECT * FROM about_paragraphs WHERE id=:id LIMIT 1";

    //fetch row from array 
    $row = $db->fetch($query, $params);
  
    // See if the paragraph was found
    if($row){
      return $row->paragraph;  
    }else{
     return false;
    }
  }
  
  //function deletes an about paragraph from the database based on id
  static public function deleteAboutParagraph($id)
    {
       $db = new Database();    

       //set table name
      $table = 'about_paragraphs';
           
      //delete row from array 
      
      if($db->delete($table, $id)){
        return true;
      }else{
        return false;
      }
    }
  
  //function adds an about paragraph to the database and takes in the content as an argument
  static public function addAboutParagraph($paragraph)
    {
      $db = new Database();    

      //set table name
      $table = 'about_paragraphs';

      //pass field name and paragraph content into $params array
      $params = array('paragraph'=>$paragraph);

      //add row to table
      if($db->insert($table, $params)){
        return true;
      }else{
        return false;
      }
    }
  
   //function updates an about paragraph in the database and takes in paragraph id and content as arguments
   static public function updateAboutParagraph($id,$paragraph)
    {
      $db = new Database();    

      //set table name
      $table = 'about_paragraphs';

      //pass field name and paragraph content into $params array
      $params = array('paragraph'=>$paragraph);

      //update row in table
      if($db->update($table,$id,$params)){
        return true;
      }else{
        return false;
      }
    }
  
  //function displays three html formatted marketing sections on front page
  static public function listMarketingLines()
  {  
     $db = new Database();    

    //no PDO paramaters needed - leave as empty array
    $params = array();

    //build PDO query to select all "Marketing Line" records
    $query = "SELECT * FROM marketing_lines";

    //fetch row from array 
    $result = $db->fetchAll($query, $params);

    //iterate through each row returned and display marketing sections with content
    foreach($result as $row){
      
      $id = $row->id;
      
      //depending on id of marketing line record - display it a little differently
      switch ($id)
      {
        case '1':
         echo '<h2 id="main_line1">';
         echo $line = $row->marketing_line;
         echo '</h2>';
         //if an admin is logged in, show content management icons
         if( $user_id = security::get_user_id() )
         {  
           echo '<a href="'.$home_url.'edit-marketline/?id='.$row->id.'"><img class="icon" src="'.$home_url.'images/pencil.jpg" title="edit" alt="edit marketing line icon"/></a>';
         }
         break;
        case '2':
         echo '<h4 id="main_line2">';
         echo $line = $row->marketing_line;
         echo '</h4>';
         //if an admin is logged in, show content management icons
         if( $user_id = security::get_user_id() )
         {   
           echo '<a href="'.$home_url.'edit-marketline/?id='.$row->id.'"><img class="icon" src="'.$home_url.'images/pencil.jpg" title="edit" alt="edit marketing line icon"/></a>';
         };
         break;
       case '3':
        echo '<p id="main_line3">';
        echo $line = $row->marketing_line;
        echo '</p>';
        //if an admin is logged in, show content management icons
        if( $user_id = security::get_user_id() )
        {  
          echo '<a href="'.$home_url.'edit-marketline/?id='.$row->id.'"><img class="icon" src="'.$home_url.'images/pencil.jpg"title="edit" alt="edit marketing line icon"/></a>';
        };
        break;
       };
    };
   
   }
  
   //function updates a marketing line in the database and takes in marketing line id and content as arguments
   static public function updateMarketLine($id,$line)
    {
     $db = new Database();    

      //set table name
      $table = 'marketing_lines';

      //pass field name and marketing line content into $params array
      $params = array('marketing_line'=>$line);

      //update row in table
      if($db->update($table,$id,$params)){
        return true;
      }else{
        return false;
      }
    }
   
  //function returns content of marketing line from the database based on id 
  static public function getMarketLine($id){  
    
     $db = new Database();    
    
     //pass marketing line id arguement into PDO params array
    $params = array('id'=>$id);

    //build query to select single marketing line from database
    $query = "SELECT * FROM marketing_lines WHERE id=:id LIMIT 1";

    //fetch row from array 
    $row = $db->fetch($query, $params);
  
    // See if the marketing line was found
    if($row){
      return $row->marketing_line;  
    }else{
     return false;
    }

  }
  
  //function returns all images that are to be displayed in the Landscape Gallery on the front page
  static public function getLandscapeGalleryImages()
  { 
     $db = new Database();    
 
    //PDO params array, empty in this case
    $params = array();

    //build query to select all images in images table that are tagged as landscape gallery items
    $query = "SELECT * FROM `images` WHERE `show_in_landscape_gallery` = '1'";

    //fetch result
    $result = $db->fetchAll($query, $params);
  
    // See if images were found
    if($result){
      //return array of image objects to be manipulated on home.php
      return $result;
    }else{
     return false;
    }
  }
  
  //function returns all images that are to be displayed in the Popular Projects Gallery on the front page
  static public function getPopularGalleryImages()
  {
    $db = new Database();    

    //PDO params array, empty in this case
    $params = array();

    //build query to select all images in images table that are tagged as popular gallery items
    $query = "SELECT * FROM `images` WHERE `show_in_popular_gallery` = '1'";

    //fetch result
    $result = $db->fetchAll($query, $params);
  
    // See if images were found
    if($result){
      //return array of image objects to be manipulated on home.php
      return $result;
    }else{
     return false;
    }
  }
  
  //helper function used in displaying the popular image gallery see home.php
  static public function is_whole_number($var){
     return (is_numeric($var)&&(intval($var)==floatval($var)));
  }
  
}