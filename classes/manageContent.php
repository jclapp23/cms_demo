<?php

//PDO helper class
require_once __DIR__.'/Database.php';

class manageContent{
	
static public function displayHtmlBox($page_id){
           //create new PHP database object (PDO)
      $db = new Database();
     $params = array('page_id'=>$page_id);

     $query = "SELECT * FROM `html_wsywig` WHERE page_id=:page_id LIMIT 1";
    
      //fetch row from array 
    $row = $db->fetch($query, $params);
  
    // See if the row was found
    if($row){
        $content = $row->content;
        echo $content;  
    }else{
     return false;
    }
  }

  static public function updateHtmlBox($page_id,$content)
    {
            //create new PHP database object (PDO)
      $db = new Database();
      //set table name
      $table = 'html_wsywig';

      //pass field name and paragraph content into $params array
      $params = array('content'=>$content);

      //update row in table
      if($db->update($table,$page_id,$params)){
        return true;
      }else{
        return false;
      }      
    }
  
     static public function getContent($page_id)
    {  
            //create new PHP database object (PDO)
      $db = new Database();

      $params = array('page_id'=>$page_id);

      $query = "SELECT * FROM `html_wsywig` WHERE page_id=:page_id LIMIT 1";
      
        //fetch row from array 
      $row = $db->fetch($query, $params);
    
      // See if the paragraph was found
      if($row){
          return $row->content;   
      }else{
       return false;
      }
    }
}