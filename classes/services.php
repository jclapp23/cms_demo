<?php

//PDO helper class
require_once __DIR__.'/Database.php';

class Services{
	
  // set home url to constant value defined in class/config.php   
  public static $home_url = HOME;
  
  // function returns an list of services from database
  static public function listServices(){  
    //create new PHP database object (PDO)
    $db = new Database();

    //no PDO paramaters needed - leave as empty array
    $params = array();

    //build PDO query to select all about paragraphs
    $query = "SELECT * FROM services";

    //fetch array of objects from database 
    $result = $db->fetchAll($query, $params);

    //return array of objects to be manipulated on services page
    return $result;
  }
  
    //function returns the title text for a service record based on service id parameter
    static public function getTitleforService($id)
    { 
      //create new PHP database object (PDO)
      $db = new Database();
      //pass service id arguement into PDO params array
      $params = array('id'=>$id);

      //build query to select single service from database
      $query = "SELECT * FROM services WHERE id=:id LIMIT 1";

      //fetch row from array 
      $row = $db->fetch($query, $params);
    
      // See if the service was found
      if($row){
        //return the title field
        return $row->title;  
      }else{
       return false;
      }
    }
  
   //function returns the title text for a service record based on service id parameter
   static public function getShortTitleforService($id)
    {  
      //create new PHP database object (PDO)
      $db = new Database();

     //pass service id arguement into PDO params array
      $params = array('id'=>$id);

      //build query to select single service from database
      $query = "SELECT * FROM services WHERE id=:id LIMIT 1";

      //fetch row from array 
      $row = $db->fetch($query, $params);
    
      // See if the service was found
      if($row){
        //return the short title field
        return $row->short_title;  
      }else{
       return false;
      }
      
    }
  
  //function updates the title and short title content of a service based on id
  static public function updateService($id,$title,$short_title)
    {
      //create new PHP database object (PDO)
      $db = new Database();
       //set table name
      $table = 'services';

      //pass field names and content into $params array
      $params = array(
        'title'=>$title,
        'short_title'=>$short_title
      );

      //update row in table
      if($db->update($table,$id,$params)){
        return true;
      }else{
        return false;
      }
    }
  
   //function deletes main service record and corresponding sub service records
   static public function deleteService($id)
    {
            //create new PHP database object (PDO)
      $db = new Database();
      //set table name
      $table = 'services';
           
      //delete row from array 
      
      if($db->delete($table, $id)){
        //do nothing 
      }else{
        return false;
      }

      //set table name
      $table = 'sub_services';
           
      //delete row from array 
      
      if($db->delete($table, $id)){
        return true;
      }else{
        return false;
      }
    }
  
  static public function addService($title,$short_title)
    {
            //create new PHP database object (PDO)
      $db = new Database();
         //set table name
      $table = 'services';

      //pass field names and content into $params array
      $params = array(
        'title'=>$title,
        'short_title'=>$short_title
      );

      //add row to table
      if($db->insert($table, $params)){
        return true;
      }else{
        return false;
      }
    }
  
static public function updateServiceKeyword($id,$keyword)
    {
            //create new PHP database object (PDO)
      $db = new Database();
       //set table name
      $table = 'portfolio';

      //pass field name and content into $params array
      $params = array('service_keyword'=>$keyword);

      //update row in table
      if($db->update($table,$id,$params)){
        return true;
      }else{
        return false;
      }
    }
   
  static public function getServiceKeyword($id)
    {  
      //create new PHP database object (PDO)
      $db = new Database();
     //pass project id arguement into PDO params array
      $params = array('id'=>$id);

      //build query to select single service keyword from database
      $query = "SELECT * FROM portfolio WHERE id=:id LIMIT 1";

      //fetch row from array 
      $row = $db->fetch($query, $params);
    
      // See if the service keyword was found
      if($row){
        //return the service keyword field
        return $row->service_keyword;  
      }else{
       return false;
      }
    }

  static public function listSubServicesByServiceId($id){
   //create new PHP database object (PDO)
   $db = new Database();
   //pass service id arguement into PDO params array
   $params = array('service_id'=>$id);
   //build PDO query to select all sub services based on service id records
    $query = "SELECT * FROM sub_services WHERE service_id=:service_id" ;

    //fetch row from array 
    $result = $db->fetchAll($query, $params);

    if( $user_id = security::get_user_id() )
    {  
    echo "<a href='".self::$home_url."add-sub-services/?service_area=$id'><img class='icon' src='".self::$home_url."images/add.png' title='add a new sub-service for this service area' alt='add a new sub service icon'/></a>";
    } 
    echo "<ul>"; 

//iterate through each row returned and display list item for sub service
    foreach($result as $row){
       echo "<li class='sub_service'>{$row->title}";
       if( $user_id = security::get_user_id() )
                        {  
                             echo '<a href="'.self::$home_url.'/edit-sub-service/?id='.$row->id.'"><img class="icon" src="'.self::$home_url.'images/pencil.jpg" title="edit sub service" alt="edit sub service icon"/></a>';
                             echo '<a class="delete" href="'.self::$home_url.'/new-hampshire-stone-mason-services/?sub-service_id='.$row->id.'"><img class="icon" src="'.self::$home_url.'images/delete.jpg" 10%" title="delete sub service" alt="delete sub service icon"/></a>';
                       };
       echo "</li>";
     }
  echo "</ul>";
}

static public function addSubService($title,$short_title,$service_id)
    {
            //create new PHP database object (PDO)
      $db = new Database();
      //set table name
      $table = 'sub_services';

      //pass field names and content into $params array
      $params = array(
        'title'=>$title,
        'short_title'=>$short_title,
        'service_id'=>$service_id
      );

      //add row to table
      if($db->insert($table, $params)){
        return true;
      }else{
        return false;
      }
    }
  
     function deleteSubService($id)
    {
            //create new PHP database object (PDO)
      $db = new Database();
      //set table name
      $table = 'sub_services';

      //add row to table
      if($db->delete($table, $id)){
        return true;
      }else{
        return false;
      }
    }
  
  static public function getTitleforSubService($id)
    {  
          //create new PHP database object (PDO)
      $db = new Database();
     //pass sub service id arguement into PDO params array
      $params = array('id'=>$id);

      //build query to select single sub service from database
      $query = "SELECT * FROM sub_services WHERE id=:id LIMIT 1";

      //fetch row from array 
      $row = $db->fetch($query, $params);
    
      // See if the sub service was found
      if($row){
        //return the title field
        return $row->title;  
      }else{
       return false;
      }
    }
  
   static public function getShortTitleforSubService($id)
    {  
            //create new PHP database object (PDO)
      $db = new Database();
    //pass sub service id arguement into PDO params array
      $params = array('id'=>$id);

      //build query to select single sub service from database
      $query = "SELECT * FROM sub_services WHERE id=:id LIMIT 1";

      //fetch row from array 
      $row = $db->fetch($query, $params);
    
      // See if the sub service was found
      if($row){
        //return the short title field
        return $row->short_title;  
      }else{
       return false;
      }
  }
  
  static public function updateSubService($id,$title,$short_title)
    {
            //create new PHP database object (PDO)
      $db = new Database();
       //set table name
      $table = 'sub_services';

      //pass field name and content into $params array
      $params = array(
        'title'=>$title,
        'short_title'=>$short_title
      );

      //update row in table
      if($db->update($table,$id,$params)){
        return true;
      }else{
        return false;
      }
    }

    static public function createFilter($keyword = '' )
  {
          //create new PHP database object (PDO)
      $db = new Database();
    //empty PDO params array, no specific fields needed
    $params = array();

    //build PDO query to select all sub services based on service id records
    $query = "SELECT * FROM services" ;

    //fetch row from array 
    $result = $db->fetchAll($query, $params);

    echo "<div>";
	  echo "<select id='filter' class='required noPlaceholder' name='service'>";
    echo "<option name='none' value='none'>Choose a service area</option>";

    //iterate through each row returned and display list item for sub service
    foreach($result as $row){
        if (($_GET['filter']==$row->short_title) || $keyword==$row->short_title)
        {
        $selected=" selected='selected' ";
        }
        else
        {
        $selected = "";
        }
        echo "<option".$selected." name='".$row->short_title."' value='".$row->short_title."' >".$row->title."</option>"; 
      };
      echo '</select>';
      echo '</div>';  
  }
  
}