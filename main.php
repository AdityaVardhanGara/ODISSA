<?php
   include("conn.php");
   $config['base_url'] = 'http://localhost/odissa/';
   session_start();
 
      $name= $_SESSION['name'];
      $sql = "SELECT * FROM teams WHERE player1 = '$name' or player2 ='$name'";
      $result = mysqli_query($conn,$sql);
      if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  if($row['player1']==$_SESSION['name']) $_SESSION['partner']=$row['player2'];
  else $_SESSION['partner']=$row['player2'];
  $_SESSION['team']=$row['name'];
  }}else{
  echo '0 resutls';
  }
 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.* {
  box-sizing: border-box;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 32%;
  padding: 0 5px;
}

.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 10px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 10px;
  text-align: center;
  background-color: #444;
  color: white;
}

.fa {font-size:50px;}
</style>
</head>
<body>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" media="screen"/>
    </head>

    <body>
        <div class="container">
          <div class="row">
            <div class="col-xs-12 text-center bg-primary" style="height:40px;">Top </div>
          </div>
          <div class="row">
            <div class="col-xs-3 bg-warning" style="height:250px;">left</div>
            <div class="col-xs-6 bg-info" style="height:250px;">
           <iframe id="testframe1" src="http://localhost/odissa/teamscore.php" style="width:100%; height:100%;"></iframe>
            
            </div>
            <div class="col-xs-3 bg-danger" style="height:250px;">Right </div>
          </div>
        </div>
    </body>
</html>
</body>
</html> 

