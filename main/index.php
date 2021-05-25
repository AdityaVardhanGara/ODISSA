<?php
   include("../conn.php");
   session_start();

   
 
      $name= $_SESSION['name'];
      $sql = "SELECT * FROM teams WHERE player1 = '$name' or player2 ='$name'";
      $result = mysqli_query($conn,$sql);
      $ysets=0;$psets=0;
      $f=0;
      if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  
  if($row['player1']==$_SESSION['name']){ $_SESSION['partner']=$row['player2'];$ysets=$row['p1sets'];$psets=$row['p2sets'];}
  else {$_SESSION['partner']=$row['player2'];$ysets=$row['p2sets'];$psets=$row['p1sets'];}
  $_SESSION['team']=$row['name'];
  $_SESSION['gsize']=$row['groupsize'];
  $id=$_SESSION['id']-1;
  }}else{
  echo '<script>alert("You are not teamed")</script>';
   header("location: ../try.php");
         exit();
  }
 ?>
<?php
for($i=0;$i<52;$i+=1)
{

$myarray = array("C","D","H","S");
$tempo=strval($i%13+2).$myarray[$i/13];

if(isset($_POST[$tempo.'_x']) or isset($_POST[$tempo.'_x'] )) { 
  $sql = "INSERT INTO `current` (`name`, `cardid`) VALUES ('$name','$tempo')";
  $result = mysqli_query($conn,$sql);
  $sql = "DELETE FROM `cards` WHERE pid=$id AND cardid=$i";
  $result = mysqli_query($conn,$sql);
  }
  }
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
  
    <title>ODISSA</title>
<!--

TemplateMo 548 Training Studio

https://templatemo.com/tm-548-training-studio

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-training-studio.css">
    <style>
    
    
    .container {
  padding: 16px;
}
    </style>
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">ODISSA<em> B2Lobby</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#features">Teamwise sets</a></li>
                            <li class="scroll-to-section"><a href="#our-classes">Leader Board</a></li>
                            <li class="scroll-to-section"><a href="#schedule">Gaming arena</a></li>
                            <li class="scroll-to-section"><a href="#contact-us">Current Flow</a></li> 
                            <li class="main-button"><a href="../end.php">End Game</a></li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/gym-video.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>Hail ODISSA</h6>
                <h2>odissa for <em>olympics</em></h2>
                <div class="main-button scroll-to-section">
                    <a href="#schedule">View your cards</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Your <em>Sets</em></h2>
                        <img src="assets/images/line-dec.png" alt="waves">
                        <p>Here you have to update your sets after viewing them in game arena section</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon.png" alt="First One">
                            </div>
                            <div class="right-content">
                                <h4>Your sets</h4>
                                <form action="../post.php" method="post">

  					
    					
   					 <input type="text" placeholder="your sets current:<?php echo $ysets;?>" name="sets" required>
					
        
   					 <button type="submit">Submit the sets</button>
				 </form>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon.png" alt="second one">
                            </div>
                            <div class="right-content">
                                <h4>Your partner sets</h4>
                                <p>Your partner told <?php echo $psets;?> sets. For any changes contact him and refresh the page.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li>
                        
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <?php
                        $sql = "SELECT name,sets,score,tscore FROM teams ";
     			 $result = $conn->query($sql);
     			 $ysets=0;$psets=0;
     			 if ($result->num_rows > 0) {
  		         while($row = $result->fetch_assoc()) {
                        ?>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon.png" alt="third gym training">
                            </div>
                            <div class="right-content">
                                <h4><?php echo $row['name'];?></h4>
                                <p>Team : <a rel="nofollow" href="#" target="_blank"><?php echo $row['name'];?> told <?php echo $row['sets'];?> sets</a> </br> Their current score is : <?php echo $row['score'];?></p>
                                <a href="#" class="text-button">Their toral score: <?php echo $row['tscore']?></a>
                            </div>
                        </li>
                      <?php
                      }}else{
                      echo 'no results';
                      }
                      ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Item End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section" id="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Kindly stay <em>AWAY</em>, from this <em>BUTTON</em>!</h2>
                        <p>This butotn refreshes the game on click</p>
                        <div class="main-button scroll-to-section">
                            <a href="../refresh.php">Refresh the game</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Our <em>Classes</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor, ultricies fermentum massa consequat eu.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              <div class="col-lg-4">
                <ul>
                  <li><a href='#tabs-1'><img src="assets/images/tabs-first-icon.png" alt="">First Training Class</a></li>
                  <li><a href='#tabs-2'><img src="assets/images/tabs-first-icon.png" alt="">Second Training Class</a></a></li>
                  <li><a href='#tabs-3'><img src="assets/images/tabs-first-icon.png" alt="">Third Training Class</a></a></li>
                  <li><a href='#tabs-4'><img src="assets/images/tabs-first-icon.png" alt="">Fourth Training Class</a></a></li>
                  <div class="main-rounded-button"><a href="#">View All Schedules</a></div>
                </ul>
              </div>
              <div class="col-lg-8">
                <section class='tabs-content'>
                  <article id='tabs-1'>
                    <img src="assets/images/training-image-01.jpg" alt="First Class">
                    <h4>First Training Class</h4>
                    <p>Phasellus convallis mauris sed elementum vulputate. Donec posuere leo sed dui eleifend hendrerit. Sed suscipit suscipit erat, sed vehicula ligula. Aliquam ut sem fermentum sem tincidunt lacinia gravida aliquam nunc. Morbi quis erat imperdiet, molestie nunc ut, accumsan diam.</p>
                    <div class="main-button">
                        <a href="#">View Schedule</a>
                    </div>
                  </article>
                  <article id='tabs-2'>
                    <img src="assets/images/training-image-02.jpg" alt="Second Training">
                    <h4>Second Training Class</h4>
                    <p>Integer dapibus, est vel dapibus mattis, sem mauris luctus leo, ac pulvinar quam tortor a velit. Praesent ultrices erat ante, in ultricies augue ultricies faucibus. Nam tellus nibh, ullamcorper at mattis non, rhoncus sed massa. Cras quis pulvinar eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                    <div class="main-button">
                        <a href="#">View Schedule</a>
                    </div>
                  </article>
                  <article id='tabs-3'>
                    <img src="assets/images/training-image-03.jpg" alt="Third Class">
                    <h4>Third Training Class</h4>
                    <p>Fusce laoreet malesuada rhoncus. Donec ultricies diam tortor, id auctor neque posuere sit amet. Aliquam pharetra, augue vel cursus porta, nisi tortor vulputate sapien, id scelerisque felis magna id felis. Proin neque metus, pellentesque pharetra semper vel, accumsan a neque.</p>
                    <div class="main-button">
                        <a href="#">View Schedule</a>
                    </div>
                  </article>
                  <article id='tabs-4'>
                    <img src="assets/images/training-image-04.jpg" alt="Fourth Training">
                    <h4>Fourth Training Class</h4>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean ultrices elementum odio ac tempus. Etiam eleifend orci lectus, eget venenatis ipsum commodo et.</p>
                    <div class="main-button">
                        <a href="#">View Schedule</a>
                    </div>
                  </article>
                </section>
              </div>
            </div>
        </div>
    </section>
    <!-- ***** Our Classes End ***** -->
    
    <section >
        <div class="container" id="schedule ">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                        <h2>Your <em>Cards</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>These are your cards</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div >
                        <table>
                            <tbody>
                            <?php
                            $id=$_SESSION['id']-1;
                            $sql = "SELECT  * FROM cards WHERE pid=$id";
				$result = $conn->query($sql);
				$temp=0;
				$myarray = array("C","D","H","S");
				
				if ($result->num_rows > 0) {
  				while($row = $result->fetch_assoc()) {
  				$cur=strval($row['cardid']%13+2).$myarray[$row['cardid']/13];
  				if($temp%4==0){
                            ?>
                                <tr>
                                    
                                    <?php } ?>
                                    <td  data-tsmeta="monday">
                                    <!--
                                   <button id=" <?php echo $cur; ?>" onclick="myFunction(<?php echo $cur; ?>,<?php echo $name;?>) "> <img src="../src/cards/<?php echo $cur;?>.jpg" alt="Italian Trulli" width="200" height="300"> </button>
                                    -->
                                    <form action="" method="post">
                                    <input type="image" src="../src/cards/<?php echo $cur;?>.jpg" name="<?php echo $cur; ?>" id="<?php echo $cur; ?>" width="200" height="300"">
                                    </form>
                                    </td>
                                <?php if($temp%4==3){
                            ?>
                                </tr>
                                <?php } $temp+=1; }}else
                                echo '0 results'; ?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Testimonials Starts ***** -->
    <section class="section" id="cards">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Current <em>Trend</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>This displays current cards flow.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/first-trainer.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>Strength Trainer</span>
                            <h4>Bret D. Bowers</h4>
                            <p>Bitters cliche tattooed 8-bit distillery mustache. Keytar succulents gluten-free vegan church-key pour-over seitan flannel.</p>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/second-trainer.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>Muscle Trainer</span>
                            <h4>Hector T. Daigl</h4>
                            <p>Bitters cliche tattooed 8-bit distillery mustache. Keytar succulents gluten-free vegan church-key pour-over seitan flannel.</p>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/third-trainer.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>Power Trainer</span>
                            <h4>Paul D. Newman</h4>
                            <p>Bitters cliche tattooed 8-bit distillery mustache. Keytar succulents gluten-free vegan church-key pour-over seitan flannel.</p>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Testimonials Ends ***** -->
    
    <!-- ***** Contact Us Area Starts ***** -->
    <section class="section" id="contact-us">
        <div class="container-fluid">
            
             <iframe id="testframe1" src="http://localhost/odissa/current.php" style="width:100%; height:600px;"></iframe>
        </div>
    </section>
    <!-- ***** Contact Us Area Ends ***** -->
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; 2020 Training Studio
                    
                    - Designed by <a rel="nofollow" href="https://templatemo.com" class="tm-text-link" target="_parent">TemplateMo</a></p>
                    
                    <!-- You shall support us a little via PayPal to info@templatemo.com -->
                    
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
  

  </body>
</html>
