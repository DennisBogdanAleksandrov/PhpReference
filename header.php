<?php 
  //*session and cookies
  //we are accessing the session variables
  session_start();
  
  //deleting a session 
  if($_SERVER['QUERY_STRING'] == 'noname'){ //! means if GET part of the url(the last letters/numbers) = 'noname' then fire the code.
    unset($_SESSION['name']); 
    //to clear all sessions
    session_unset();
  }
  //Null coalescing. if _SESSION doesn't exist then set $name to empty
  $name = $_SESSION['name'] = $_SESSION['NAME'] ?? 'Guest';
  
  //getting cookie. The cookies were set fron sandbox.php. the cookie is set when the the browser sends a POST through the submit button it leaves a cookie in the browser for some specified duration of time.
  $gender = $_COOKIE['gender'] ?? 'Unknown';
  if($gender == 'Unknown'){
    $finalResult = "We don't know what you are";
  } else {
    $finalResult = 'you are a ' . $gender;
  }
  
?>

<div>

  <h1>The Header from header.php</h1>
  <li>Hello <?php echo htmlspecialchars($name); ?>. <?php echo htmlspecialchars($finalResult) ?> (this is the session variable)</li>
  
</div>
