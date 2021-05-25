<?php
   include("conn.php");
   
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


<div class ="center">
                        <table>
                            <tbody>
                            <?php
                            $id=$_SESSION['id']-1;
                            $sql = "SELECT  * FROM current";
				$result = $conn->query($sql);
				$temp=0;
				$myarray = array("C","D","H","S");
				$temp2=$_SESSION['gsize'];
				if ($result->num_rows > 0) {
  				while($row = $result->fetch_assoc()) {
  				$cur=$row['cardid'];
  				
  				if($temp%$temp2==0){
                            ?>
                                <tr>
                                    
                                    <?php } ?>
                                    <td  data-tsmeta="monday"><img src="src/cards/<?php echo $cur;?>.jpg" alt="Italian Trulli" width="200" height="300">
                                    <figcaption><?php echo $row['name']?></figcaption>
                                    </td>
                                <?php if($temp%$temp2==$temp2-1){
                            ?>
                                </tr>
                                <?php } $temp+=1; }}else
                                echo '0 results'; ?>
                            
                            </tbody>
                        </table>
                    </div>

</body>
</html>

