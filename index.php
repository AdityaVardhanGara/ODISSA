<?php
   include("conn.php");
   $config['base_url'] = 'http://localhost/odissa/';
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
 echo 'connection succesful';
      
      $name = mysqli_real_escape_string($conn,$_POST['name']);
      
      $sql = "SELECT name FROM players WHERE name = '$name'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      
      if($count == 0) {
          $sql = "INSERT INTO `players` (`playerID`, `name`) VALUES (NULL, '$name');";
      $result = mysqli_query($conn,$sql);
      }
       
         $_SESSION['name'] = $name;
         $sql = "SELECT * FROM `players` WHERE name='$name'";
      $result = mysqli_query($conn,$sql);
      $ysets=0;$psets=0;
      if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  $_SESSION['id'] = $row['playerID'];
  }}else echo '0 results';
         header("location: try.php");
         exit();
   }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 30%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2><center>Welcome to B2Lobby</h2>

<form action="" method="post">
  <div class="imgcontainer">
    <img src="src/logo.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Your Name</b></label>
    <input type="text" placeholder="type your name eg: chinki, george kutty" name="name" required>
</div>
        
    <button type="submit">Enter the lobby</button>
</form>

</body>
</html>
