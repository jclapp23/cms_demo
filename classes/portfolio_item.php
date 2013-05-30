<?php

//PDO helper class
require_once __DIR__.'/Database.php';

class portfolio_item{

 // set home url to constant value defined in class/config.php   
  public static $home_url = HOME;
  
 // function returns the url for the first image associated with a project id
  
  static public function getFirstImageLocations($project_id)
  {
     $db = new Database();  

     //pass project id arguement into PDO params array
      $params = array('project_id'=>$project_id);

      //build query to select image record based on project id
     //limit one so only first image is pulled
      $query = "SELECT * FROM images WHERE project_id=:project_id LIMIT 1";

      //fetch row from array 
      $row = $db->fetch($query, $params);
    
      // See if the image row was found
      if($row){
        //return the image location field
        return $row->image_location;  
      }else{
       return false;
      }
  }



//function returns an array of all project objects , or subset if filter is selected
static public function getPortfolioList()
{
    $db = new Database();  

    //logic to determine if filter is set or not.. if set, pull only those portfolio items, otherwise pull all
    if (isset($_GET['filter']))
    {
      if ($_GET['filter']=='none')
      {
        //no PDO paramaters needed - leave as empty array
        $params = array();
        //build query to pull all portfolio items since there's not filter set
        $query = "SELECT * FROM `portfolio`";
      }
      else
      {
        $service_keyword = $_GET['filter'];  
        //build PDO paramaters array with service_keyword field set to value of the filter
        $params = array('service_keyword'=>$service_keyword);
        //build query to pull only those of selected filter category
        $query = "SELECT * FROM `portfolio` WHERE `service_keyword`=:service_keyword";
      }
    }
    else
    {
      //no PDO paramaters needed - leave as empty array
      $params = array();
      //build query to pull all portfolio items since there's not filter set
      $query = "SELECT * FROM `portfolio`";
    }
    
    //fetch row from array 
    $result = $db->fetchAll($query, $params);

    //iterate through each row returned and display paragraphs with content
    foreach($result as $row){

      $image_location = self::getFirstImageLocations($row->id);
        
        echo "<div class='portfolio_display'>";
        echo "<a href='".self::$home_url."construction-project-details/project-id-".$row->id."'>";
        echo "<img src='".self::$home_url."images/thumb-".$image_location."' alt='".reset(explode('.',$image_location)) ."' title='".reset(explode('.',$image_location)) ."' style=\"border:1px solid black;margin-bottom:10px;\" />";
        echo "</a>";    
        echo "<br /><br />";
        echo "<span class='portfolio_label'>date: </span>" . $row->project_date;
        echo "<br />";
        echo "<span class='portfolio_label'>service type: </span>" . $row->service_keyword;
        echo "<br />";
        echo "<span class='portfolio_label'>description: </span>" . $row->portfolio_description;
        echo "<br />";
        
        if( $user_id = security::get_user_id() )
        {        
        echo "<a id='edit' href='".self::$home_url."edit-portfolio/?project_id=".$row->id."'><img src='".self::$home_url."images/pencil.jpg' class='icon' title='edit project' alt='edit project icon'/></a>&nbsp;&nbsp;";
        echo "<a class='delete' href='".self::$home_url."delete-action.php?project_id=".$row->id."'><img src='".self::$home_url."images/delete.jpg' class='icon' title='delete project' alt='delete proect icon'/></a>";
        };      
        echo "</div>";
    }   
}

 
    // function returns info from images table for a specific project id
  
  static public function getImageDetails($project_id)
  {
        $db = new Database();  

    //pass project id arguement into PDO params array
    $params = array('project_id'=>$project_id);

    //build PDO query to select all about paragraphs
    $query = "SELECT * FROM images WHERE project_id=:project_id LIMIT 1";

    //fetch array of objects from database 
    $result = $db->fetchAll($query, $params);

    //return array of image objects to be manipulated on portfolio page
    return $result; 
  }
  
  //function returns object containing info from portfolio table for specific project id passed in as arg
  static public function getProjectDetails($project_id)
  {
        $db = new Database();  

     //pass project id arguement into PDO params array
      $params = array('project_id'=>$project_id);

      //build query to select image record based on project id
     //limit one so only first image is pulled
      $query = "SELECT * FROM portfolio WHERE id=:project_id LIMIT 1";

      //fetch row from array 
      $row = $db->fetch($query, $params);
    
      // See if the image row was found
      if($row){
        //return the image location field
        return $row;
      }else{
       return false;
      }
  }

   /*
   * Create a new record in the portfolio table
   * @param string service keyword
   * @param string portfolio description'
   * @param datetime portfolio project date
   * @return int The newly created project_id
   */
    
  static public function addNewPortfolioItem($service_keyword,$portfolio_description,$project_date)
  {
        $db = new Database();  

        //set table name
      $table = 'portfolio';

      //pass field names and content into $params array
      $params = array(
        'service_keyword'=>$service_keyword,
        'portfolio_description'=>$portfolio_description,
        'project_date'=>$project_date
      );

      //add row to table
      if($id = $db->insert($table, $params)){
        return $id;
      }else{
        return false;
      }
  }
  
  /*
   * Create a new record in the portfolio table
   * @param string service keyword
   * @param string portfolio description'
   * @param datetime portfolio project date
   * @return int The newly created project_id
   */
  
  static public function addImageForNewItem($image_location,$project_id)
  {  
        $db = new Database();  

        //set table name
      $table = 'images';

      //pass field names and content into $params array
      $params = array(
        'image_location'=>$image_location,
        'project_id'=>$project_id
      );

      //add row to table
      if($db->insert($table, $params)){
        return true;
      }else{
        return false;
      }
  }
  
  static public function deletePortfolioItem($project_id){
        $db = new Database();  

      //delete items from the server    
      $images = self::getImageFilenamesByProjectId($project_id);
      
      foreach($images as $image){
		    if ( is_file("../images/".$image) ) {
 			 unlink("../images/".$image);
		    }
		   if ( is_file("../images/thumb-".$image) ) {
 			 unlink("../images/thumb-".$image);
		    }
	}
	  
      //create a second PDO object to execute a query to delete all images related to a project id

      try {
            $host = HOST;
            $port = PORT;
            $database = DATABASE;
            $db2 = new PDO("mysql:host=$host;port=$port;dbname=$database", USERNAME, PASSWORD);
            $db2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
     
       //set table name
      $table = 'portfolio';
      $table2 = 'images';

      //if the portfolio item and its corresponding images are both deleted successfully return true

      if($db->delete($table,$project_id)&&!($db2->exec("DELETE FROM $table2 WHERE project_id=$project_id")==0)){
        return true;
      }else{
        return false;
      }
  }
  
  //function returns array of filenames based on project_id argument
  static public function getImageFilenamesByProjectId($project_id)
  {
    $db = new Database();  

    //initialize array to store image locations
    $images = array();

    //pass service id arguement into PDO params array
    $params = array('project_id'=>$project_id);

   //build PDO query to select all sub services based on service id records
    $query = "SELECT * FROM images WHERE project_id=:project_id" ;

    //fetch row from array 
    $result = $db->fetchAll($query, $params);

    //iterate through each row returned and add image location to image_location array
    foreach($result as $row){
      $images[] = $row->image_location;
    }
    return $images;
  }
 
  static public function addLandscape($id)
    {
      $db = new Database();  

      //set table name
      $table = 'images';

      //pass field name and content into $params array
      $params = array('show_in_landscape_gallery'=>'1');

      //update row in table
      if($db->update($table,$id,$params)){
        return true;
      }else{
        return false;
      }
    }
  
  static public function addPopular($id)
    {
      $db = new Database();  

     //set table name
      $table = 'images';

      //pass field name and content into $params array
      $params = array('show_in_popular_gallery'=>'1');

      //update row in table
      if($db->update($table,$id,$params)){
        return true;
      }else{
        return false;
      }
    }
  
    static public function removePopular($id)
    {
     $db = new Database();  

      //set table name
      $table = 'images';

      //pass field name and content into $params array
      $params = array('show_in_popular_gallery'=>'0');

      //update row in table
      if($db->update($table,$id,$params)){
        return true;
      }else{
        return false;
      }
    }
  
    static public function removeLandscape($id)
    {
      $db = new Database();  

      //set table name
      $table = 'images';

      //pass field name and content into $params array
      $params = array('show_in_landscape_gallery'=>'0');

      //update row in table
      if($db->update($table,$id,$params)){
        return true;
      }else{
        return false;
      }
    }
  
   static public function deleteImage($id)
    {
      $db = new Database();  

      //set table name
      $table = 'images';
           
      //delete row from array 
      
      if($db->delete($table, $id)){
        //do nothing 
      }else{
        return false;
      }
    }
  
   static public function updatePortfolioDescription($id,$desc)
    {
      $db = new Database();  

      //set table name
      $table = 'portfolio';

      //pass field name and content into $params array
      $params = array('portfolio_description'=>$desc);

      //update row in table
      if($db->update($table,$id,$params)){
        return true;
      }else{
        return false;
      }
    }
   
  static public function getPortfolioDescription($id)
    {  
      $db = new Database();  

      //pass id arguement into PDO params array
      $params = array('id'=>$id);

      //build query to select single project database
      $query = "SELECT * FROM portfolio WHERE id=:id LIMIT 1";

      //fetch row from array 
      $row = $db->fetch($query, $params);
    
      // See if the project was found
      if($row){
        //return the desc field
        return $row->portfolio_description;  
      }else{
       return false;
      }
    }

  static public function updateProjectDate($id,$date)
    {
      $db = new Database();  

      //set table name
      $table = 'portfolio';

      //pass field name and content into $params array
      $params = array('project_date'=>$date);	

      //update row in table
      if($db->update($table,$id,$params)){
        return true;
      }else{
        return false;
      }
    }
   
  static public function getProjectDate($id)
    {  
      $db = new Database();  

      //pass id arguement into PDO params array
      $params = array('id'=>$id);

      //build query to select project from database
      $query = "SELECT * FROM portfolio WHERE id=:id LIMIT 1";
      
      //fetch row from array 
      $row = $db->fetch($query, $params);
    
      // See if the project was found
      if($row){
        //return the date field
        return $row->project_date;  
      }else{

       return false;
      } 
    }
}

