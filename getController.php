 <?php
  //frontPage class
  require_once __DIR__.'/classes/frontPage.php';
  //portfolio item class
  require_once __DIR__.'/classes/portfolio_item.php';
  //services class
  require_once __DIR__.'/classes/services.php';

  //If there is a page variable in the url..
    if( isset( $_GET['page'] ) ){
    // ..show that page instead
      $page = $_GET['page'];}
    
    if ( $page == 'index.php'){
      $page = 'home';
  }

    if( isset( $_GET['project_id'] ) ){
     //clean up url so mod_rewriting works properly
    // remove variable from page string
    $project_id= "project_id=".$_GET['project_id'];
    $page = str_replace($project_id,"",$page);
  }
  
  if( isset( $_GET['id'] ) ){
    //clean up url so mod_rewriting works properly
    // remove variable from page string
    $id= "id=".$_GET['id'];
    $page = str_replace($id,"",$page);
  }
  
  if( isset( $_GET['edit-page'] ) ){
   //clean up url so mod_rewriting works properly
    // remove variable from page string
  $edit_page= "edit-page=".$_GET['edit-page'];
  $page = str_replace($edit_page,"",$page);
  }
  
  if( isset( $_GET['service_id'] ) ){
   //clean up url so mod_rewriting works properly
    // remove variable from page string
  $service_id= "service_id=".$_GET['service_id'];
  $page = str_replace($service_id,"",$page);
  //call function to delete service if delete icon is selected by admin
  services::deleteService($_GET['service_id']);
  }

  if( isset( $_GET['service_area'] ) ){
  // ..for adding services
    // remove filter from page string
  $service_area= "service_area=".$_GET['service_area'];
  $page = str_replace($service_area,"",$page);
  }
  
  if( isset( $_GET['sub-service_id'] ) ){
    //clean up url so mod_rewriting works properly
    // remove variable from page string
    $subservice_id= "sub-service_id=".$_GET['sub-service_id'];
    $page = str_replace($subservice_id,"",$page);
    //call function to delete subservice if delete icon is selected by admin
    services::deleteSubService($_GET['sub-service_id']);
   }
  
  if( isset( $_GET['paragraph_id'] ) ){
  //clean up url so mod_rewriting works properly
  // remove variable from page string
     $paragraph_id= "paragraph_id=".$_GET['paragraph_id'];
     $page = str_replace($paragraph_id,"",$page);
     frontPage::deleteAboutParagraph($_GET['paragraph_id']);
  }
  
  if( isset( $_GET['add_landscape'] ) ){
   //clean up url so mod_rewriting works properly
   // remove variable from page string
   $add_landscape= "add_landscape=".$_GET['add_landscape'];
   $page = str_replace($add_landscape,"",$page);
   // ..if admin clicks on add landscape button, call function to add images to landscape image slider on home page
   portfolio_item::addLandscape($_GET['add_landscape']);
   unset($_GET['remove_landscape']);
  }
  
  if( isset( $_GET['remove_landscape'] ) ){
   //clean up url so mod_rewriting works properly
   // remove variable from page string
   $remove_landscape= "remove_landscape=".$_GET['remove_landscape'];
   $page = str_replace($remove_landscape,"",$page);
    // ..if admin clicks on add landscape button, call function to remove images from landscape image slider on home page
   portfolio_item::removeLandscape($_GET['remove_landscape']);
  }
  
   if( isset( $_GET['add_popular'] ) ){
   //clean up url so mod_rewriting works properly
   // remove variable from page string
   $add_popular= "add_popular=".$_GET['add_popular'];
   $page = str_replace($add_popular,"",$page);
   // ..if admin clicks on add popular button, call function to add images to popular image slider on home page
   portfolio_item::addPopular($_GET['add_popular']);
  }
  
  if( isset( $_GET['remove_popular'] ) ){
   //clean up url so mod_rewriting works properly
   // remove variable from page string
   $remove_popular= "remove_popular=".$_GET['remove_popular'];
   $page = str_replace($remove_popular,"",$page);
   // ..if admin clicks on add popular button, call function to remove images from popular image slider on home page
    portfolio_item::removePopular($_GET['remove_popular']);
  }
  
  if( isset( $_GET['delete_image'] ) ){
   //clean up url so mod_rewriting works properly
   // remove variable from page string
   $delete_image= "delete_image=".$_GET['delete_image'];
   $page = str_replace($delete_image,"",$page);
   // ..if admin clicks on delete image icon, call function to delete image
   portfolio_item::deleteImage($_GET['delete_image']);
  }
?>