<?php

  require('user_validator.php');
  
  if(isset($_POST['submit'])){
    //creating a new instance that takes $_POST data and validates the username and email key value pairs
    $validation = new UserValidator($_POST); //$_POST is a variable that holds the username, email and submit.
    
    $errors = $validation->validateForm();

    // save data to db
     
  }  

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <h2>Create new user</h2>
  <form action="" method="POST">
    <label>Username:</label>
    <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username']) ?? '' ?>">
    <div><?php echo $errors['username'] ?? '' ?></div>

    <label>Email:</label>
    <input type="text" name="email" value="<?php echo htmlspecialchars($_POST['email']) ?? ''  ?>">
    <div><?php echo $errors['email'] ?? '' ?></div>
    
    <input type="submit" value="submit" name="submit">
  </form>
</head>
<body>

</body>
</html>