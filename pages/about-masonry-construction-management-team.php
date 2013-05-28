
 <div id="about-wrapper" class="main">
  <div>
    <h1>About Us</h1>
    
    <?php
    echo'<h4>Mangement Team';
      
   if( $user_id = security::get_user_id() )
   {  
      echo '<a href="'.$home_url.'edit-about-management/?edit-page=about-masonry-construction-management-team"><img class="icon" src="'.$home_url.'images/pencil.jpg" title="edit"/></a>';                 
    };  
      
    
    echo '</h4>';
    ?>
  </div>

  <?php
   manageContent::displayHtmlBox('about-masonry-construction-management-team');
  ?> 
        
  <div class="clear"></div>
</div>   

  