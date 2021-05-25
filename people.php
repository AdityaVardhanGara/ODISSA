<?php
   include("conn.php");
   $config['base_url'] = 'http://localhost/odissa/';
   session_start();

      
      
   ?>
   
<!DOCTYPE html>
<html>
<head>
<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button1 {background-color: #4CAF50;} /* green */
.button2 {background-color: #008CBA;} /* Blue */
.button3 {background-color: #f44336;} /* Red */ 
.button4 {background-color: #e7e7e7; color: black;} /* Gray */ 
.button5 {background-color: #555555;} /* Black */

.center {
  text-align: center;
  border: 3px solid green;
}
</style>
</head>
<body>
<div class="center">
<h2>people currently in the lobby are:</h2>

<?php

$sql = "SELECT  name FROM players";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $a=0;
  while($row = $result->fetch_assoc()) {
  if($a%2==0){
  ?>
  <div><?php } ?>
  <span><button class="button button<?php echo $a%5+1;?>"><?php echo $row["name"]?></button> </span>
  <?php
  if($a%2==1){
  ?>
  </div><?php } ?>
  <?php
  $a=$a+1;
  }
} else {
  echo "0 results";
}
$conn->close(); ?>
</div>


</body>
</html>
