
<?php
  //!*? This is all there is to php. EASY!
  //* Keep in mind to always surround the users inputs with htmlspecialchars when ever displaying into the browser, sending any data including the hidden form field to send ids.

//* variables and some methods
  $name = "Dennis";
  $name2 = 'Daniel';
  
  //This is a const variable
  define('NAME', 'Yoshi');
  
  //concatination;
  //?echo $name . $name2 . 'hello ';
  
  //String interpalation doesn't work with single quotes ' '
  //?echo "Hey my name is $name";
  
  //prebuilt function that will find the length of a string.
  //?echo strlen($name);

    //takes a string and converts in to uppercase.
  //?echo strtoupper($name);

    //makes it lowercase
  //?echo strtolower($name);
  
    //replacing (what to replace, replace with what, in what context)
  //?echo str_replace('n', 'm', $name);

  $num1 = 46; 
  $floatNum = 5.34;

    //basic operators - *, /, +, -, **   the last on means ^
  //?echo $floatNum * $num1**2;    

  //?echo floor($floatNum); //rounds 
  
  //?echo ceil($floatNum); //rounds up

//* arrays
  $peopleOne = ['shaun', 'crystal', 'ryu'];

    //creating array with a function array()
  $peopleTwo2 = array('ken', 'Dennisss');

    //overidding a particular value in the array
  $peopleTwo2[1];

    // You'd have to use print_r for the browser to read it.
  //?print_r($peopleTwo2);  

    //push method means to add to the end of the array
  array_push($peopleTwo2, 70);

    //merging
  $peopleThree = array_merge($peopleOne, $peopleTwo2);  
  
    //associative arrays (key values pairs)
  $ninjasOne = [
    'Dennis' => 'Aleksandrov', 
    'Daniel' => 'Chapurin',
    'Irina' => 'Chapurina',
  ];
    //mutating
  $ninjasOne['Irina'] = 'something else';
    //adding another element
  $ninjasOne['Lilya'] = 'Volishinyuk';
  //?print_r($ninjasOne);
    //method that counts the how many items are in the array.
  //?echo count($ninjasOne);

//*multi-dimentional arrays
  $food = [
    'salty' => ['firstItem' => 'fish'],  
    'greesy' => ['firstItem' => 'chicken', 'beef', 'bacon'],
    'sweet' => ['firstItem' => 'sugar canes', 'lolipops', 'soda'],
    'jucey' => ['firstItem' => 'watermelon', 'mango'],
  ];
  $products = [
    ['name' => 'shiny star', 'price' => 20],
    ['name' => 'green shell', 'price' => 10],
    ['name' => 'red shell', 'price' => 15],
    ['name' => 'gold coin', 'price' => 5],
    ['name' => 'lightning bolt', 'price' => 40],
    ['name' => 'bannana skin', 'price' => 2]
  ];

  //?print_r($food['greesy'][2]);

    //adding another array to $food
  $food['liquid'] = ['healthy' => 'water', 'not healthy' => 'soda'];

  //?print_r($food);
  
  //array_pop takes the last property and puts it to the center. 
  $popped = array_pop($food);
  //?print_r($popped);
  
//*loops. Loops are like conditional statements just like if statements. If $i is less than 5/count() then execute else stop.
  $card = ['ace', 'diamond', 'club', 'heart'];

  for ($i = 0; $i < 5; $i++) {
    //?echo 'Some template ';
  }
  
    for ($i = 0; $i < count($card); $i++) {
      //?echo $card[$i] . '<br />';
    }
  
  //?print_r($food['salty']['firstItem']);

  //$foods is a temperary variable. For each food  
  foreach($products as $product) {
    //?echo $product['name'] . ' - ' . $product['price'];
    //?echo '<br/>';
  }

//! this allows for setting the amount of times the while function will execute outside the function. So you could create a whole program around typing a few digits or words for it to fire and turn the rest of the cogs.
  $i = 0; //initalizing $i outside the function
  while($i < count($products)){
    //?echo $products[$i]['name'];
    //?echo '<br />'; 
    $i++; //to prevent an infinate loop. Every time the function executes $i will incriment by 1 and the function will stop when it reaches count($products)
  }

    //* if statement. && || < > => =< =
  foreach($products as $product){
   if ($product['price'] < 15 && $product['price'] > 2) {
     //?echo $product['name'] . '<br />';
   }
  }// for each product that has the price less than 15 & greater than 2 the function will echo that array's name.

  foreach($products as $product){
    if ($product['name'] === 'lightning bolt'){
    break;
    }
    if($product['price'] > 15){
      continue;
    }
    //?echo $product['name'] . '<br />';
  }

  
  //ternary operators
  $score = 50;
  $val = $score > 40 ? 'high score!' : 'low score :O';
  echo $val . '<br />';
  
  //! So here are the types of conditional statements programming has. 
  //* Loops: fire block of code until a condiion is met.
  //* While: a loop but conditional variable is outside of the function.
  //*foreach: do something for each one of the variables stated
  //*if statements.
  //* (js has cases).

  //*functions 

  function sayHello($name = "friend"){
    echo "good morning $name";
  }
  //?sayHello();
  
  function formatProduct($product){
    return "{$product['name']} costs $ {$product['price']} to buy <br />"; //you got to use {} when using [].
  } //return means to store the result into the $variable that invokes the function.
  $formatted = formatProduct(['name' => 'gold star', 'price' => 20]); 
  echo $formatted;
  
//* scope. To use a global scope inside a function you'd do this:
  $name = 'Aleksandrov';
  function herrow(){
    global $name; 
    echo "Hello $name";
    $name = 'Simon';  //bringing the global variable into the function will and changing the variable here will result in the global $name variable change.
  };
  herrow();
  echo '<br />' . "Hey $name"; //global variable changed from within a function.

  $lastName = 'Valishinyuk'; 
  echo '<br />' . $lastName;
  function sayBye(&$someVariable){
    $someVariable = 'Chapurin';
    echo '<br />' . "bye $someVariable";
  }
  sayBye($lastName); //Strangly I've just learned that the function doesn't fire until you explicately state it to. What a no brainer.
  echo '<br />' . $lastName . "<br />"; //sayBye() changed the value to $lastName;

  //----------------

  //* The two methods to include a file into here.   
  include('file2.php');  //if failed to include the code still carries on
  include 'file2.php';

  require('file2.php'); //if failed to require then the code doesn't carry on. Fatal error.
  require 'file2.php';

  //* superglobals
  echo $_SERVER['SERVER_NAME'] . "<br />"; //localhost
  echo $_SERVER['REQUEST_METHOD'] . "<br />"; //GET
  echo $_SERVER['SCRIPT_FILENAME'] . "<br />"; // C:/xampp/htdocs/test123/sandbox.php  The path/url to this file
  echo $_SERVER['PHP_SELF'] . "<br />"; // /test123/sandbox.php  Path relative to localhost 
  $_SERVER['QUERY_STRING']; //this won't show but what it is is the GET  part of the url, id for instance.

  if(isset($_POST['submit'])){
    //*setting cookies
    setcookie('gender', $_POST['gender'], time() + 86400); //means set a cookie called 'gender'for the POST request with the name of 'gender' and make it expire in 86400(1 day) from now time().
    
    //* sessions. This is like cookies that are working and variables set no matter until the session ends and I believe that is after a certian amount of time or when they leave the site for a little time.
    session_start(); 
    $_SESSION['name'] = $_POST['name'];  
    header('location: index.php');
  }
  
//* file system - part 1
  // $quotes = readfile('readme.text');
  // echo $quotes;

  $file = 'readme.text';
  if(file_exists($file)){
    //read file
    echo readfile($file) . '<br />';
    
    //copy file
    copy($file, 'clonedFile.txt') . '<br />'; //php will create the file for you if you don't have it.
    
    //absolute path, url 
    echo realpath($file) . '<br />';
    
    //file size
    echo filesize($file) . '<br />';

    //rename file
    rename($file, 'renamedTheFile.txt');
    
  } else {
    echo 'file does not exist' . '<br />';
  }
  
  // mkdir('newDirectory');

//* file system - part 2
  $file2 = 'renamedTheFile.txt'; 
  
  //allowed to only reading a file 
  //?? $handle = fopen($file2, 'r'); //r stands for end
  //allows to read and write a file
  //??$handle = fopen($file2, '+r');
  //write from the end of a file 
  $handle = fopen($file2, 'a+');
  
  //read the file by the filesize 
  //? echo fread($handle, filesize($file2));
  echo fread($handle, 12);
  echo '<br />';
  echo fread($handle, filesize($file2));
  
  //reads by each line. This for instance would read the first 2 lines.
  echo fgets($handle);
  echo fgets($handle);
  
  //read a single character
  echo fgetc($handle);
  echo fgetc($handle);
  echo fgetc($handle);
  
  //overwritting a file from the biggining if +r in handle 
  //?? fwrite($handle, "\nEverything popular is wrong"); 
  //writting at the end of a file if +a in handle since that means focus the "cursor" at the end of the text
  //?? fwrite($handle, "\nEverything is super popular");

  //always good to close a file when do with it
  fclose($handle);
  
  //delete file
  //?? unlink('clonedFile.txt');
  echo "<hr />";

//* classes. They blueprints. Object oriented programming OOP

  
  class Resturant { //starts with cap to signify that it's a class.
    public $favFood; //means can be accessed outside of class. 
    public $name;
    public $costPerPerson;

    //* Constructor. It is a function that runs everytime we instantiate a class.
    public function __construct($favFood, $name, $cost){ //notice we didn't add $
      $this->favFood = $favFood; //$this references to the class itself.
      $this->name = $name; //$this references to the class itself.
      $this->costPerPerson = $cost;
    }
    
    public function order(){
      echo $this->name . ' ordered ' . $this->favFood . $this->costPerPerson;
    }
  }
  $ResturantOne = new Resturant('Sushi', 'Bill', '$25'); //just like in js, 'new' means you are using an 'instance' of the class. 
  echo $ResturantOne->costPerPerson;
  $ResturantOne->order(); //firing only the order() function within the User class. 
  echo '<br /> <hr />';

//working with 'private' 
  class User {
    //access modifier
    protected $email = 'me';
    private $name;
    public $gmail;
    public $username;
    public $role = 'member';

    public function __construct($username, $gmail){
      $this->username = $username;
      $this->gmail = $gmail;
    }
    public function message(){
      return "$this->email sent a new message";
    }
    
  //setting parameters
    public function login(){
      echo 'the user logged in';
    }
    //getter
    public function getName(){
      return $this->name;
    }
    //setter
    public function setName($name){ //to set private $name you'd have to go through the validation 
      if(is_string($name) && strlen($name) > -1){ //if is string and is string length is greater than one length then execute the first block of code
        $this->name = $name;
        return "name has been updated to $name";
      } else {
        return 'not a valid name';
      }
    }
    public function getEmail(){
      return $this->email;
    }
    public function setEmail($email){
      if(strpos($email, '@') > -1) {//if there's @ in string position then fire the code
        $this->email = $email;
      }
    }
  }
  //created a new instance and passed in arguments.
  $userTwo = new User('logan12', 'logan@gmail.com');

  echo $userTwo->setEmail('Dan@amm');
  echo $userTwo->getEmail();
  echo $userTwo->getName();

  echo "<br />";
  //tells you all the variables in the class
  print_r(get_class_vars('Resturant'));
  echo "<br />";
  //tells you all the methods in the class
  print_r(get_class_methods('Resturant'));

  class AdminUser extends User {
    public $level;
    //overriding a value
    public $role = 'admin'; 
    //overide the parent constructor
    public function message(){
      return "$this->email, an admin, sent a message";
    }
    public function __construct($level, $email, $username){
      $this->level = $level;
      //directly took the constructor from it's User, the parent of this instance.
      parent:: __construct($email, $username); 
    }
    //Magic methods
    public function __clone(){
      $this->username = $this->username . '(cloned)<br />';
    }
    public function __destruct(){
      echo "the user $this->username was removed";
    }
    public function getGmailLvlUserName(){
      return "The gmail for $this->email is $this->username";
    }
  }
  
  $userFive = new AdminUser(5, 'trumpnation@gmail.com', "Trumpster");
  echo $userFive->getGmailLvlUserName() . "<br />";

  echo $userTwo->role . '<br />';
  echo $userTwo->message() . '<br />';
  echo $userFive->role . '<br />';
  echo ucfirst($userFive->message()) . '<br />';
  //to ascertain what class created the instance.
  echo get_class($userTwo) . '<br />'; //User

  //after the script fully runs all instances 'destruct' automatically 
  //? unset($userFive);

  $userSix = clone $userFive;
  echo $userSix->username;

  //* Static properties. Allows you to directly access the properties and methods from class without creating an instance of it. 
  class Weather {
    public static $tempConditions = ['cold', 'mild', 'warm'];
    public static function celsiusToFarenheit($c){
      return $c * 9 / 5 + 32;
    }
    public static function determineTempCondition($f){
      if($f < 40){
        return self::$tempConditions[0];
      } else if ($f > 70){
        return self::$tempConditions[1];
      } else {
        return self::$tempConditions[2];
      }
    }
  }
  //use print_r for arrays and echo for strings
  print_r(Weather::$tempConditions);
  echo "<br />";
  echo Weather::celsiusToFarenheit(20);
  echo "<br />";
  echo Weather::determineTempCondition(20);
  echo "<br />";
  echo Weather::determineTempCondition(50);
  echo "<br />";
  echo Weather::determineTempCondition(80);
  echo "<br />";
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

  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

    <input type="text" name="name">
    <input type="submit" name="submit" value="submit">
  </form>

  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="text" name="name">
    <select name="gender">
      <option value="male">male</option>
      <option value="female">female</option>
    </select>
    <input type="submit" name="submit" value="submit">
  </form>
  <hr />

  <h1><?php echo $name; ?></h1>
  <h1><?php echo NAME; ?></h1>
  <h1><?php include 'file2.php' ?></h1>
  <ul>
    <?php foreach($products as $product){ ?>  <!-- To write any php into html you'll can add it as normally but with "?php" and "?>" at each end   -->
      <h3><?php echo $product['name']; ?></h3>
      <p>$ <?php echo $product['price']; ?></p>
    <?php } ?>
  </ul>
  <ul>
    <?php foreach($products as $product){ ?>
      <?php if($product['price'] > 15){ ?>
        <li><?php echo $product['name']; ?></li>
      <?php } ?>
    <?php } ?>
  </ul>

  <p>Congrads. You've submitted the form correctly and now you've been redirected to this page.</p>
  
</body>
</html>