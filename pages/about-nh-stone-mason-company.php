<div id="about-wrapper" class="main">
  <div id="about_blurb">
    <h1>About Us</h1>
    <?php 
    if( $user_id = security::get_user_id() )
    {  
    echo '<a href="'.$home_url.'add-about/"><img class="icon" src="'.$home_url.'images/add.png" title="add a new about paragraph"/></a>';
    }    
    ?>
    <h4>Great Escapes Patio &amp; Stonework, Inc.</h4>
    
    <?php
      frontPage::listAboutParagraphs();
    ?>
  </div>
  <div class="clear"></div>
</div>