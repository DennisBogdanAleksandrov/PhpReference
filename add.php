<?php 
//this is the file that connects to the database ninja_pizza
include('config/db_connect.php');

 //* sending data to the server

   //GET is sending data via url.
    //When we we submit the form the email will be stored in the _GET; Email, title ad ingriedients will be stored in the _GET variable. if ['submit'] then it will run the block of code.
// if(isset($_GET['submit'])){
//   echo $_GET['email'];
//   echo $_GET['title'];
//   echo $_GET['ingredients'];
// } // this block of code is without validation.

$email = $title = $ingredients = '';
$errors = array('email' => '', 'title' => '', 'ingredients' => '');

//These are the steps by which the validation works.
  //1. If method is empty meaning that nothing was put in to the input field then just echo out hint.
  //2. else we assign the method to a $variable
  //3. now validate if the right form of text was submitted. You could use Ajax which comes with php, no installation is needed.
  //4. make it so that the user didnn't have to retype things.

//* Sending data to the server with GET & POST and implementing validation. We've also used ajax.

if(isset($_POST['submit'])){ //if submitted this fire block of code runs 
  
 //?validation means to pop up a message letting the user know that they've typed in or didn't type in the right data.
    //Use 2 data validations, html and a code from the server to validate the data.
    

  // check email
  if(empty($_POST['email'])){
    $errors['email'] = 'An email is required';
  } else{
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //! notice there's a negation opperator here '!'
      $errors['email'] = 'Email must be a valid email address';
    }
  }
  // check title
  if(empty($_POST['title'])){
    $errors['title'] = 'A title is required';
  } else{
    $title = $_POST['title'];
    if(!preg_match('/^[a-zA-Z\s]+$/', $title)){ //! This is ajax. If !pass the preg_test then do this:
      $errors['title'] = 'Title must be letters and spaces only';
    }
  }
  // check ingredients
  if(empty($_POST['ingredients'])){
    $errors['ingredients'] = 'At least one ingredient is required';
  } else{
    $ingredients = $_POST['ingredients'];
    if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
      $errors['ingredients'] = 'Ingredients must be a comma separated list';
    }
  }
  
  if(array_filter($errors)){ //if there are no errors inside the array then it'll return to false and therefore will execute the code else if returns true then there is an error and we won't execute the code.
    //?echo 'errors in form';
  } else {
    //* saving/inserting data to the database & and escaping it.
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
    
    //creating sql that inserts VALUES into the database pizzas. in this case
    $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title','$email','$ingredients')";

    // save to db and check
    if(mysqli_query($conn, $sql)){ //so when mysql is closed then redirect the user to index.php but if fails echo the error.
      // success
      header('Location: index.php');
    } else {
      echo 'query error: '. mysqli_error($conn);
    }
    
  }
} // end POST check

?>



<!DOCTYPE html>  
<html lang="en">
<head>
  <title>PHP reference page</title>
</head>
<body>
  <div style="background:lightgray;"><?php include 'header.php' ?></div>
   
<!-- echo $_SERVER['PHP_SELF'] aka /test123/sandbox.php --> 
  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <div><?php echo $errors['email']; ?></div>
    <label>Your Email:</label>
    <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">

    <div><?php echo $errors['title']; ?></div>
    <label>Pizza Title:</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">

    <div><?php echo $errors['ingredients']; ?></div>
    <label>Ingredients (comma seperated):</label>
    <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
    
    <input type="submit" name="submit" value="submit">
  </form>
</body>
</html>