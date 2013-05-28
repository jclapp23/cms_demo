<div id="portfolio-detail-wrapper" class="main">      
  <a href="<?php echo $home_url;?>prior-stone-masonry-project-portfolio/">Go Back</a> 
    <h1>Project Details</h1>
     
   <?php   
            
    $row = portfolio_item::getProjectDetails($_GET['project_id']); 
    echo "<span class='portfolio_label'>date: </span>" . $row->project_date;
    echo "<br />";
    echo "<span class='portfolio_label'>service type: </span>" . $row->service_keyword;
    echo "<br />";
    echo "<span class='portfolio_label'>description: </span>" . $row->portfolio_description;
    echo "<br />";
    if( $user_id = security::get_user_id() )
        {  
         echo "<a id='edit' href='".$home_url."edit-portfolio/?project_id=".$_GET['project_id']."'><img src='".$home_url."images/pencil.jpg' class='icon' title='edit'/></a>&nbsp;&nbsp;";   
        }    
    echo "<br />";
    
   $result = portfolio_item::getImageDetails($_GET['project_id']);
    
    foreach($result as $row)
    {
     $image = $row->image_location;
     $image_href =  $home_url."images/$image";    
     echo "<div class='project_details'>";
     echo "<a href=$image_href>";
      // echo "<img src=\"".$home_url."getthumb.php?path=$image&amp;size=285\" style=\"border:1px solid black;margin-bottom:10px;\" />";
    echo "<img src='".$home_url."images/thumb-".$image."' alt='".reset(explode('.',$image)) ."' title='".reset(explode('.',$image)) ."' style='border:1px solid black;margin-bottom:10px;' />";

     echo "</a>";    
  
     if( $user_id = security::get_user_id() )
        {  
      
      
     if($row->show_in_landscape_gallery==1)
      {        
        echo "<a id='remove_cover_photo' href='".$home_url."construction-project-details/project-id-".$row->project_id."/remove-landscape-".$row->id."'><img src='".$home_url."images/landscape_remove.jpg' class='icon' title='remove from landscape gallery'/></a>&nbsp;&nbsp;";
      }
      else
      { 
        echo "<a id='add_cover_photo' href='".$home_url."construction-project-details/project-id-".$row->project_id."/add-landscape-".$row->id."'><img src='".$home_url."images/landscape_add.jpg' class='icon' title='add to landscape gallery'/></a>&nbsp;&nbsp;";
      };
      
      if($row->show_in_popular_gallery==1)
      {
        echo "<a id='remove_popular_photo' href='".$home_url."construction-project-details/project-id-".$row->project_id."/remove-popular-".$row->id."'><img src='".$home_url."images/popular_remove.jpg' class='icon' title='remove from popular projects gallery'/></a>&nbsp;&nbsp;";  
      }
      else
      {
         echo "<a id='add_popular_photo' href='".$home_url."construction-project-details/project-id-".$row->project_id."/add-popular-".$row->id."'><img src='".$home_url."images/popular_add.jpg' class='icon' title='add to popular projects gallery'/></a>&nbsp;&nbsp;";
      };  
     echo "<a class='delete' href='".$home_url."construction-project-details/project-id-".$row->project_id."/?delete_image=".$row->id."'><img src='".$home_url."images/delete.jpg' class='icon' title='delete'/></a>&nbsp;&nbsp;";
     };
     echo "</div>";
    };
     
    ?>
    
</div>  