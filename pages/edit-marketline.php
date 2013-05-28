<?php  
  $id = $_GET['id'];
  $line = frontPage::getMarketLine($id);
?>

<div id="edit-marketline" class="main">
  &nbsp;
  <h1 >Edit Marketing Line</h1>
  <form action="<?php echo $home_url?>edit-marketline-action.php" method="post">
    <input type="hidden" value="<?php echo $id; ?>" name="id" />
    <label>Line:&nbsp;</label><input style="width:100%" type="text" value="<?php echo $line;?>" name="line"/><br/>
    <input type="submit" value="Edit Line" />
  </form>
</div>
