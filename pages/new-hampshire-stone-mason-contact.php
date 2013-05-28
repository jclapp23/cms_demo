<div id="contact" class="main">
  <div class="float"> 
  <?php
    echo'<h1>Contact';
      
   if( $user_id = security::get_user_id() )
   {  
      echo '<a href="'.$home_url.'edit-contact/"><img class="icon" src="'.$home_url.'images/pencil.jpg" title="edit"/></a>';                 
    };  
      
    echo '</h1>'
    ?>
    
   <?php
      manageContent::displayHtmlBox('new-hampshire-stone-mason-contact');
   ?> 
  </div>
 <div id="contact-map" class="float">
 
   <div id="map_canvas"></div>
  
 </div>
 <div class="clear"></div>  
</div>
 