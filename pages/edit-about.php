<?php  
  $id = $_GET['id'];
  $paragraph= frontPage::getAboutParagraph($id);
  
?>

<div id="edit-about" class="main">
  <h1>Edit About Paragraph</h1>
  <form action="<?php echo $home_url?>edit-about-action.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id ?>"/>
    <label>Paragraph:&nbsp;</label><textarea class="p" name="paragraph"><?php echo $paragraph; ?></textarea>
    <input type="submit" value="Submit Changes" />
  </form>
</div>

