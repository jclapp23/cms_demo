<?php
  $page_id = 'contact';
  $content= manageContent::getContent('new-hampshire-stone-mason-contact');
?>

<div id="edit-contact" class="main">
  <h1>Edit Contact</h1>
  <form action="<?php echo $home_url?>edit-contact-action.php" method="post">
    <input type="hidden" name="id" value="<?php echo $page_id ?>"/>
    <label>Content:&nbsp;</label><textarea class="p" name="content"><?php echo $content; ?></textarea>
    <input type="submit" value="Submit Changes" />
  </form>
</div>

