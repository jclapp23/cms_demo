<?php

$logged_in = false;

if( !empty( $_POST ) )
{
  // Process the form only if it was sent

  if( $logged_in = security::log_in_user($_POST['email'], $_POST['password']) )
  {
	echo '<div id="login-wrapper" class="main"> <a href="'.$home_url.'home"> You\'ve successfully logged in, go back to home page </a></div>';
  };
  
}
?>
<div id="login-wrapper" class="main">  

  <div id="login_div">
                
    <form action="" method="post">
    
      <h2>Log In</h2>
            
      <?php if( $logged_in === 0 ): ?>
          <p class="error">The email address and/or password did not match any in the system.
          Please try a different combination.</p>
      <?php else: ?>
          <p>Please log in to continue.</p>
      <?php endif; ?>
    
      <div>
        <label>Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="email" name="email" autofocus="autofocus" />
      </div>
      
      <div>
        <label>Password</label>
        <input type="password" name="password" />
      </div>
            <input type="hidden" name="token" value="<?php echo security::get_token(); ?>" />
      <div>
        <label>&nbsp;</label>
        <input type="submit" value="Log In" />
      </div>
    
    </form>
    
    </div> <!-- Login -->
    
</div>
     