<?php 

  //escape every data send to the database and every data received from the database for the browser to run.

  include('config/db_connect.php');

  if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']); //$_POST... means get the value of the element with the name='id_to_delete'
    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";
    if(mysqli_query($conn, $sql)){
      //success
      header('Location: index.php');
    } else {
      //failure
      echo 'query error:' . mysqli_error($conn);
    }
  }

  //! everytime you are reching out into the database to get data you'd always do the same steps.
  //check get request id param
  if(isset($_GET['id'])){
    //this means that whatever the id the url is on is the data associated to that id we want to get from the database.    
    $id = mysqli_real_escape_string($conn, $_GET['id']); 
    //created a sql to select from the pizzas database the data where/that-is-associated $id, _GET request.
    $sql = "SELECT * FROM pizzas WHERE id = $id"; 
    //get the query result
    $result = mysqli_query($conn, $sql);
    //fetch restumt in array format
    $pizza = mysqli_fetch_assoc($result); //_assoc means to fetch the one data array... 
    //free the memory
    mysqli_free_result($result);
    //close the connection
    mysqli_close($conn);

    //?print_r($pizza);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
   <div style="background:lightgray;"><?php include 'header.php' ?></div>
  
  <div>
    <?php if($pizza): ?> 

    <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
    <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
    <p><?php echo date($pizza['created_at']); ?></p>
    <h5>Ingredients:</h5>
    <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

    <form action="details.php" method="POST"> <!-- action means to run that file when clicked on it's element.-->
      <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
      <input type="submit" name="delete" value="Delete">
    </form>
    
    <?php else: ?>

    <h5>No such pizza exists</h5>

    <?php endif; ?>
  </div>

</body>
</html>