<?php 

    //* Reaching out to the database
  //so we are reaching out to the database to see if the user has privlage to this page.
  $conn = mysqli_connect('localhost', 'Shaun', 'test123', 'ninja_pizza'); //ninja_pizza is what the database is called

  //check if $conn was valid to access the site 
  if(!$conn){ //if connection is false then it'll fire an error message 
    echo 'Connection error: ' . mysqli_connect_error();
  }

?>