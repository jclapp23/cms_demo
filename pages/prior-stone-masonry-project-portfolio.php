<div id="portfolio-wrapper" class="main">    
    <h1>Portfolio</h1>      
    <a id='clear_filter' href='<?php echo $home_url?>prior-stone-masonry-project-portfolio/'><img src='<?php echo $home_url?>images/clear-filter.png' title='clear filter' alt='clear filter icon'/></a>    
        <?php
        if( $user_id = security::get_user_id() )
        {  
         echo '<a id="add_port" href="'.$home_url.'?page=add"><img src="'.$home_url.'images/add.png" class="icon" title="add a new portfolio item"/></a>';
        }
        ?>
        <?php
		    
    services::createFilter();
    portfolio_item::getPortfolioList();
    
    ?>
  <div class="clear"></div>
</div>
      

