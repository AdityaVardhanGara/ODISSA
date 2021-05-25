<?php
   include("conn.php");
   session_start();
   session_destroy ();
   
    $sql = "DELETE FROM current";
      $result = mysqli_query($conn,$sql);
      
      
       $sql = "DELETE FROM cards";
      $result = mysqli_query($conn,$sql);
      
       $sql = "DELETE FROM players";
      $result = mysqli_query($conn,$sql);
      
       $sql = "DELETE FROM teams";
      $result = mysqli_query($conn,$sql); 
   
   header("location: index.php");
   exit();
  ?>
