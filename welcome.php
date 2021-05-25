<?php
   include("conn.php");
   $config['base_url'] = 'http://localhost/odissa/';
   session_start();
   ?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script type="text/javascript">
$(function() {
setInterval(refreshiframe, 5000);
});
function refreshiframe() {
$('#testframe').attr('src', $('#testframe').attr('src'));
}
</script>

<style>
#lefty {
                float:left; 
                background:Red;
                width:25%;
                height:280px;
            }
            #midy{
                float:left; 
                background:Green;
                width:50%;
                height:280px;
            }
            #righty{
                float:right;
                background:blue;
                width:25%;
                height:280px;
            }
#leftbox {
                float:left; 
                background:grey;
                width:30%;
                height:300px;
            }

 #rightbox{
                float:right;
                background:grey;
                width:70%;
                height:300px;
            }
body {font-family: Arial, Helvetica, sans-serif;}


input[type=text], input[type=password] {
 
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
  width: 50%;
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
     width: 50%;
  }
}
</style>
</head>
<body>

<p><center>Welcome to the lobby <?php echo $_SESSION['name'];?> :)</p>


 <div> 
<div id="lefty">
<iframe id="testframe" src="http://www.aspdotnet-suresh.com" height="330"></iframe>
</div>
<div id= "midy" >
    <img src="src/lobby.jpeg" >
  </div>
<div id="righty">
<iframe id="testframe" src="http://www.aspdotnet-suresh.com" height="330"></iframe>
</div>
</div>
  
 <div id = "leftbox">
                <h2>Rules:</h2>
                It is a good platform to learn programming.
                It is an educational website. Prepare for
                the Recruitment drive  of product based 
                companies like Microsoft, Amazon, Adobe 
                </br> </br>Rule1 </br></br>rule2 </br></br>rule3
            </div> 
  <div id = "rightbox">
                <h2>Form your teams:</h2>
               <form action="" method="post">
                       

                 <div class="container">
                 <span>
                 <input type="text" placeholder="enter your team name" name="tname" required></span>
                 <span>
                 <input type="text" placeholder="team short name (3 chars)" name="tsname" required></span>
                 <span>
                 <input type="text" placeholder="Your partner is:" name="partner" required></span>
                 </div>
                 <div>
                 <label for="num_play">Choose number of players:</label>
                 <span>
                  <select name="cars" id="cars">
   
     				 <option value="n4">4</option>
     				 <option value="n6">6</option>
     				 <option value="n8">8</option>
     				
  		</select></span>
                 </div>
        
        
        
    <button type="submit">Enter the lobby</button>
    <button type="teamed">Already teamed?</button>
</form>

            </div>


</body>
</html>
