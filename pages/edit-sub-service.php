<?php  
  $id = $_GET['id'];
  $title = services::getTitleforSubService($id);
  $short_title = services::getShortTitleforSubService($id);
?>

<div id="edit-sub-services" class="main">
  <h1>Edit Service</h1>
  <form action="<?php echo $home_url?>edit-sub-services-action.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id ?>"/>
    <label>Title:&nbsp;</label><input type="text" value="<?php echo $title; ?>" name="title"/><br/>
    <label>Short Title(one descriptive word no spaces!):&nbsp;</label><input type="text" value="<?php echo $short_title; ?>" name="short_title"/><br/>
    <input type="submit" value="Submit Changes" />
  </form>
</div>

