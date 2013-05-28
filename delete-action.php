<?php
  //portfolio item class
  require_once __DIR__.'/classes/portfolio_item.php';
  //database config
require_once __DIR__.'/classes/config.php';

  //set home url to the value defined in the classes/config.php script
  $home_url = HOME;
	
	if(portfolio_item::deletePortfolioItem($_GET['project_id']))
		{
			echo "The portfolio item has been deleted successfully.";
			echo "<br/>";
			echo "<a href='".$home_url."prior-stone-masonry-project-portfolio/'>Go back to portfolio.</a>";
		}
		else
		{
			echo "The was an error attempting to delete the portfolio item.";
			echo "<br/>";
			echo "<a href='".$home_url."prior-stone-masonry-project-portfolio/'>Go back to portfolio and try again.</a>";
		}	
?>
