<div id="main-row">
<div id="main_wrap" class="main"> 
        
        <div id="gallery_wrapper">
        <div class="flexslider carousel">
          <ul class="slides">
           <?php 
             $result = frontPage::getLandscapeGalleryImages();
             foreach($result as $row)
               {
                 $image = $home_url."images/".$row->image_location; 
                 echo "<li>";
                 echo "<a href='".$home_url."prior-stone-masonry-project-portfolio/'><img src='".$image."' alt='".reset(explode('.',$row->image_location)) ."' title='".reset(explode('.',$row->image_location)) ."'' /></a>";
                 echo "</li>";
               }
            ?>
          </ul>
        </div>  
       </div>
 
  <div id="home-marketing-info">
    <?php
      frontPage::listMarketingLines();
     ?>
  </div>

  <div class="clear"></div>
</div>     

<div id="popular-project-row">
  <div id="popular_projects" class="main">
    <h1>Popular Projects</h1>
    <div id="popular-slider-wrapper">  
      <div id="slider">
        <?php 
             $result = frontPage::getPopularGalleryImages();
             $count = 0;
             $new_div = true;
             foreach($result as $row)
               {
                 $image = $home_url."images/thumb-".$row->image_location; 
                 $count++;
                
                 if(frontPage::is_whole_number($count/3))
                 {
                   echo "<a href='".$home_url."construction-project-details/project-id-".$row->project_id."/'><img src='".$image."' alt='".reset(explode('.',$row->image_location)) ."' title='".reset(explode('.',$row->image_location)) ."'' /></div></a>";
                   $new_div = true;
                 } 
                 elseif($new_div==true)
                 {  
                   echo "<div><a href='".$home_url."construction-project-details/project-id-".$row->project_id."/'><img src='".$image."' alt='".reset(explode('.',$row->image_location)) ."' title='".reset(explode('.',$row->image_location)) ."'' /></a>";
                   $new_div = false;
                 }
                 else
                 {   
                   echo "<a href='".$home_url."construction-project-details/project-id-".$row->project_id."/'><img src='".$image."' alt='".reset(explode('.',$row->image_location)) ."' title='".reset(explode('.',$row->image_location)) ."'' /></a>";
                 }  
               }//end while
            ?>  
      </div>  
      
    </div>
  </div> 
</div>
 
</div>

<div id="information" class="main">


<div id="about-wrapper" class="main">
  <div id="about_blurb">
    <h1>About Us</h1>
    <?php 
    if( $user_id = security::get_user_id() )
    {  
    echo '<a href="'.$home_url.'add-about/"><img class="icon" src="'.$home_url.'images/add.png" alt="add about paragraph icon" title="add a new about paragraph"/></a>';
    }    
    ?>
    <h4>Great Escapes Patio &amp; Stonework, Inc.</h4>
    
    <?php
      frontPage::listAboutParagraphs();
    ?>
      
  </div>
 
  <div class="clear"></div>
  
</div>
</div> 
  


