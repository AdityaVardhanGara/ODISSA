<?php
    include("conn.php");
   session_start();
   $name=$_SESSION['name'];
      if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $set = mysqli_real_escape_string($conn,$_POST['sets']);
      $sets=(int)$_POST['sets'];
      $ysets=0;$psets=0;
      $name= $_SESSION['name'];
      $sql = "SELECT * FROM `teams` WHERE `player1` = '$name' or `player2` ='$name'";
      $result = mysqli_query($conn,$sql);
   
      if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  
  if($row['player1']==$_SESSION['name']){
  $tsets=$row['p2sets']+$sets;
  
  $sql= "UPDATE teams
SET p1sets = $sets, sets = $tset
WHERE player1 = '$name' or player2 ='$name'";
$result = mysqli_query($conn,$sql);
  }
  else {
    $tsets=$row['p1sets']+$sets;
  
  $sql= "UPDATE teams
SET p2sets = $sets, sets = $tsets
WHERE player1 = '$name' or player2 ='$name'";
$result = mysqli_query($conn,$sql);
  }

  }}else{
  echo '0 resutls';
  }
  
        header("location: main/index.php");
         exit();
   }
   
?>
