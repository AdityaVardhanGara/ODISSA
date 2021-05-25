<?php
   include("conn.php");
   $config['base_url'] = 'http://localhost/odissa/';
   session_start();

      
      
   ?>
   
<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.center {
  text-align: center;
  border: 3px solid green;
}
</style>
</head>
<body>
<div class="center">
<h2>Teams formed so far</h2>

<table>
  <tr>
    <th>Team name</th>
    <th>Player 1</th>
    <th>Player 2</th>
  </tr>
 <?php

$sql = "SELECT  name,sets,score,tscore FROM teams";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  ?>
  <tr>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['sets'];?></td>
    <td><?php echo $row['score'];?></td>
    td><?php echo $row['tscore'];?></td>
  </tr>
 <?php
  }
} else {
  echo "0 results";
}
$conn->close(); ?>
</table>

</div>


</body>
</html>
