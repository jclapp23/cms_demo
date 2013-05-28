<?php

//PDO helper class
require_once __DIR__.'/Database.php';

//********STATIC SECURITY CLASS**************//
class security{

// set home url to constant value defined in class/config.php   
static protected $home_url = HOME;
  
/*
 * Prints a set of links which vary if the user is logged in or not
 */
static public function show_user_status()
{
  echo '<div id="status">';
  
  // See if the user is logged in
  if( $user_id = self::get_user_id() )
  {
    $user = self::get_user( $user_id );
    
    echo "Not $user->email? <a href='".self::$home_url."'logout'>Log Out</a>";
  }
  else
  {
    echo "<a href='".self::$home_url."login'><img src='".self::$home_url."images/login.png' alt='clear filter icon' title='admin login for content management' alt='login key icon'/></a>";
  }
  echo '</div>';
}  
  
/*
 * Fetches a single user from the database
 * @param int The id of the user being fetched
 * @return Object The user matching the specified id, or a new user
 */
static public function get_user($id = 0)
{
  //create new PHP database object (PDO)
  $db = new Database();
  //pass user id arguement into PDO params array
  $params = array('id'=>$id);

  //build query to select single user from database
  $query = "SELECT * FROM users WHERE id=:id LIMIT 1";

  //fetch row from array 
  $row = $db->fetch($query, $params);
  
  // See if the user was found
  if($row){
    $user = $row;
    return $user;
  }
}

/*
 * Get the currently logged in user's id
 * @return int The logged in user's id, or 0
 */
static public function get_user_id()
{
  return array_key_exists('user_id', $_SESSION ) ? $_SESSION['user_id'] : 0;
}
  
/*
 * Redirects the browser to another url after PHP finishes running
 * @param string The url with which to redirect the browser
 */

static public function is_valid_email( $str )
{
  return (bool)filter_var($str, FILTER_VALIDATE_EMAIL);
}

/*
 * Attemps to log a user in
 * @param string The email address used to log in
 * @param string The password used to log in
 * @return int The logged in user's id, or 0
 */

public static function log_in_user($email, $password)
{
  // Make sure the token in your session matches the on in the form, if it's not valid, escape the function by returning false
  if( !(self::is_valid_token()) ){
    return false;
  }
    
  // Validate the email
  if( !(self::is_valid_email( $email )) ){
      return false;
  }
  
        //create new PHP database object (PDO)
      $db = new Database();

  //pass user email and password arguements into PDO params array
  $params = array(
    "email" => $email,
    "password" => $password
  );

  //build query to select single user based on email and password combo
  $query = "SELECT id FROM users WHERE email=LOWER(:email) AND password=:password LIMIT 1";

  //fetch row from array 
  $row = $db->fetch($query, $params);
  
  // See if a user was found
  if($row){
    $user = $row;
    
    // Log the user in by storing their id in the session
    $_SESSION['user_id'] = $user->id;
    
    session_regenerate_id();
    
    return $user->id;
  }
  //otherwise return false because login failed
  return false;
}

/*
 * Attemps to log a user out
 * @return boolean Whether the user was logged in
 */
static public function log_out_user()
{
  if( array_key_exists('user_id', $_SESSION ) )
  {
    unset( $_SESSION['user_id'] );
    session_regenerate_id();
    return true;
  }
  return false;
}
  
//redirection function
public static function redirect($url)
{
  header("Location: $url");
}


// Create a random number, save it in the session, and return it for outside use
public static function get_token()
{
  // Create a random number and save it in $token
  $token = md5(uniqid(rand(), true));

  // Save the token so it may be used on other pages
  $_SESSION['token'] = $token;
  
  return $token;
}

public static function is_valid_token()
{   
  // If the token is not set in the session OR the token doesnt match between the form and the session, return false, otherwise return true
  if( !isset($_SESSION['token']) || $_POST['token'] != $_SESSION['token'] )
  {
    return false;
  }
  return true;
}
  
} 