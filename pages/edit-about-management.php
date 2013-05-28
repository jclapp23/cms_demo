<?php  
  $page_id = $_GET['edit-page'];
  $content= manageContent::getContent('about-masonry-construction-management-team');
?>

<div id="edit-about" class="main">
  <h1>Edit About Management</h1>
  <form action="<?php echo $home_url?>edit-about-mangement-action.php" method="post">
    <input type="hidden" name="id" value="<?php echo $page_id ?>"/>
    <label>Content:&nbsp;</label><textarea class="p" name="content"><?php echo $content; ?></textarea>
    <input type="submit" value="Submit Changes" />
  </form>
</div>

