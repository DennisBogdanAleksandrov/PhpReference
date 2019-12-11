<?php 
//* in this section what we have done is we went into mysql database using the username and password, got the database we needed and displayed nicely into the html template.

  include('config/db_connect.php');
  
  //*write query for all pizzas
  //SELECT means going out to get data
  // '*' means get all the columns from the SELECTed table
  //ORDER BY means in what order.
  $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

  //make query & get result
  $result = mysqli_query($conn, $sql); //first parameters is to see if you have authorization to connect to the data and the second parameters is what you want to retrieve from the database
  
  //fetch the resulting rows as an array since the database gave gives us data in a different format
  $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

  //after you are done with the query it is good practice to free the memory
  mysqli_free_result($result);

  //closing connection
  mysqli_close($conn);

  //the data queried in is in string for so we are using explode() to split accordingly into an array. The first paramater is in how you'd like to split it and the second is the name of the new array.
  //explode(',', $pizzas[0]['ingredients']);   
                     
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


  <h4>Pizzas!</h4>
  <?php foreach($pizzas as $pizza): ?> <!--//? made string return from the database into an array -->
    <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
    <ul>
    <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?> <!-- //! this foreach is inside of a foreach. This second one is a function that says for ech , split the word. -->
      <li><?php echo htmlspecialchars($ing) ?></li>
    <?php endforeach; ?>
    </ul>
      <a href="details.php?id=<?php echo $pizza['id']?>">Details page</a>
  <?php endforeach; ?>
      <br /><br /><br />
      <a href="add.php">Add another pizza</a>
<!--//? { where replaced with : and } replaced with endforeach -->
  <?php if(count($pizzas) >=3): ?>
    <p>there are 3 or more pizzas</p>
  <?php else: ?>
    <p>there are less than 3 pizzas</p>
  <?php endif; ?>
  
   
</body>
</html>