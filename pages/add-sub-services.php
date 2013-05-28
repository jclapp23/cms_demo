<div id="add-sub-services" class="main">
  <h1>Add Sub Service</h1>
  <form action="<?php echo $home_url?>add-sub-services-action.php" method="post">
    <input type="hidden" name="service_id" value="<?php echo $_GET['service_area']?>"/>
    <label>Title:&nbsp;</label><input type="text" name="title"/><br/>
    <label>Short Title(one descriptive word):&nbsp;</label><input type="text" name="short_title"/><br/>
    <input type="submit" value="Add Sub Service" />
  </form>
</div>
