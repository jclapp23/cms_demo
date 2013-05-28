<div id="addnew-wrapper" class="main">    

<h2>Add New Portfolio Item</h2>

<form enctype="multipart/form-data" id="add_form" action="<?php echo $home_url?>add-action.php" method="post">
    <?php services::createFilter(); ?>
    <br/><br/>
    
    <label>project date:</label><input id="project_date" type="date" name="project_date" /><br/><br/>
    <label>image upload (at least 1 required!):</label><br/><br/>
    <label class="image_1" >image 1:</label><input class="image_1" id="image_1" type="file" name="image_1" /><br/>
    <label class="image_2" >image 2:</label><input class="image_2" id="image_2" type="file" name="image_2" /><br/>
    <label class="image_3" >image 3:</label><input  class="image_3" id="image_3" type="file" name="image_3" /><br/>
    <label class="image_4" >image 4:</label><input class="image_4" id="image_4" type="file" name="image_4" /><br/>
    <label class="image_5" >image 5:</label><input class="image_5" id="image_5" type="file" name="image_5" /><br/>
    <label class="image_6" >image 6:</label><input class="image_6" id="image_6" type="file" name="image_6" /><br/><br/>
    
    <label>portfolio description:</label><textarea id="portfolio_description" name="portfolio_description"></textarea><br/><br/>
     <input type="submit" value="Add New" />
    <input type="reset" value="Reset" />
    <a href="<?php echo $home_url?>prior-stone-masonry-project-portfolio/">Cancel</a>
</form>

</div>