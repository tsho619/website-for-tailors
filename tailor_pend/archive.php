<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>YETTY THREADS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    
        <!-- Script -->
    <script src='jquery-3.1.1.min.js' type='text/javascript'></script>

    <!-- jQuery UI -->
     
    <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>
    <script src='jquery-ui.min.js' type='text/javascript'></script>
        <meta charset="utf-8">
        <!--Boostrap & family-->
  <!--<link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
 <link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 
  <!--<script src="ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <script src="cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
      
    
    
     <link href="css/style.css" rel="stylesheet">
    
     <!--Main JS File -->
  <script src="js/main.js"></script>


    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>   
<style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>









<?php
//This is the counter for the alert
$connect = mysqli_connect("localhost", "root", "", "customer");


$days_remaining = "";


$count1 = "";
          $inc=1;


$result = mysqli_query($connect, "SELECT * FROM measurement");
        while ($row = mysqli_fetch_assoc($result)){
             $get_dailyenddate = $row['enddate'];
 
    //GET NUMBER OF MONTHS & DAYS LEFT
      $original_reminder  = date('Y-m-d', strtotime($get_dailyenddate));
                    $dated = strtotime("$original_reminder");
                    
            $remaining_seconds = $dated - time();
          
                
                ///////COUNT ONLY DAYS
$days_remaining = floor($remaining_seconds / 86400); 
             $days_ahead =   $days_remaining >7;
               if($days_remaining < 7 && $days_remaining > -1){
                  // 
                $count1 = $inc;
                $inc++;  
               }
               $sql_join = "SELECT status FROM measurement WHERE status = 'Delivered'";
    $merge2 = mysqli_query($connect, $sql_join);
        while ($row = mysqli_fetch_assoc($merge2)){
             $stat_pend = $row['status'];
             if($stat_pend){
                 $count1 = $inc - 1;
             }
        }
//               if($days_remaining < 0){
//                $count3 = "";
//               $inc--;  
//               
//               }
        }
        if($count1 == ""){
            $count1 = "";
          
            
          
        }
?>



<?php
$con = mysqli_connect("localhost", "root", "", "bookings");
$inc = 1;
$stat_pend = "";
$count2 = "";
$sql_join = "SELECT status FROM orders WHERE status = 'Pending'";
$merge2 = mysqli_query($con, $sql_join);
while ($row = mysqli_fetch_assoc($merge2)){
             $stat_pend = $row['status'];
 
    if($status= 'Pending'){
        $count2 = $inc;
        $inc++;
    }
    
}
    if($count2==""){
        $count2 = "";
    
}



?>













<body style="background-color: #000;">
    
    <header style="background-color: whitesmoke; width: 110%;">
        
         <div class="header-area header_area">
            <div class="main-header">
             <div class="header-bottom header-sticky">
        
        <div class="logo">
            <a style="margin-left: 60px;" href="index2.php"></a><h1 style="font-size: 35px;">ALERT</h1>
        </div>
       
          <div class="header-left  d-flex f-right align-items-center">
              
       <div class="main-menu f-right d-none d-lg-block">
                        <nav> 
                            <ul id="navigation">                                                                                                                                     
                               <li ><a style="margin-left: -420px; color:  black;" href="admin_login.php">Home</a></li>
                               <li><a style="margin-left: -350px;" href="request.php">Request<b style="margin-left: 4px; color: green;"><?php echo "$count2";?></b></a></li>
                                 <li><a style="margin-left: -260px;" href="archive.php">Archive</a></li>
                               <li><a style="margin-left: -190px;" href="delivered.php">Delivered</a></li>
                                <li><a style="margin-left: -100px;" href="Alert.php">Alert<b style="margin-left: 4px; color: red;"><?php echo "$count1";?></b></a></li>
                                
                            </ul>
                        </nav>
                    </div>
              
              
                
                </div>          
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
             </div>
            </div>
         </div>
                
                
    </header>






<?php


$link = mysqli_connect("localhost", "root", "", "customer"); 



//$select_style = $_REQUEST['select_style'];

$sql_style =  "SELECT * FROM measurement";
$merge = mysqli_query($link, $sql_style);

echo "<center>";
echo "<div style='margin-left: -10px;' class='container'>";
echo "<caption style='font-size: 24px;'> Customers";
echo "<table border='1' class='table table-sm table-hover table-light'>";
echo "<thead class='thead-light'>";
echo "<tr>";
echo "<th>S/N</th>";
echo "<th>name </th>";
echo "<th>shoulder</th>";
echo "<th>chest</th>";
echo "<th>sslength</th>";
echo "<th>lslength</th>";
echo "<th>elbow_length</th>";
echo "<th>round_elbow</th>";
echo "<th>wrist</th>";
echo "<th>arm</th>";
echo "<th>neck</th>";
echo "<th>uhip</th>";
echo "<th>waist</th>";
echo "<th>lhip</th>";
echo "<th>thigh</th>";
echo "<th>crotch</th>";
echo "<th>knee_length</th>";
echo "<th>round_knee</th>";
echo "<th>trouser</th>";
echo "<th>ankle</th>";
echo "<th>enddate</th>";
echo "<th>status</th>";
echo "<th>View Details</th>";
echo "<th>Remove From List</th>";
echo "</tr>";
echo "</thead>";

while ($row = mysqli_fetch_assoc($merge)){
    
echo "<tbody>";
    echo "<tr>";
echo "<td>".$inc."</td>";
echo "<td>".$row['name']."</td>";
 echo "<td>".$row['shoulder']."</td>";
echo "<td>".$row['chest']."</td>";
echo "<td>".$row['sslength']."</td>";
echo "<td>".$row['lslength']."</td>";
echo "<td>".$row['elbow_length']."</td>";
echo "<td>".$row['round_elbow']."</td>";
 echo "<td>".$row['wrist']."</td>";
 echo "<td>".$row['arm']."</td>";
 echo "<td>".$row['neck']."</td>";
 echo "<td>".$row['uhip']."</td>";
 echo "<td>".$row['waist']."</td>";
 echo "<td>".$row['lhip']."</td>";
 echo "<td>".$row['thigh']."</td>";
 echo "<td>".$row['crotch']."</td>";
 echo "<td>".$row['knee_length']."</td>";
 echo "<td>".$row['round_knee']."</td>";
   echo "<td>".$row['trouser']."</td>";
   echo "<td>".$row['ankle']."</td>";
  echo "<td>".$row['enddate']."</td>";
  echo "<td>".$row['status']."</td>";
  echo "<td><a style='color: red;' href='dashboard.php?name=" .$row['name']."&shoulder=".$row['shoulder']."&chest=".$row['chest']."&sslength=".$row['sslength']."&lslength=".$row['lslength']."&elbow_length=".$row['elbow_length']."&round_elbow=".$row['round_elbow']."&wrist=".$row['wrist']."&arm=".$row['arm']."&neck=".$row['neck']."&uhip=".$row['uhip']."&waist=".$row['waist']."&lhip=".$row['lhip']."&thigh=".$row['thigh']."&crotch=".$row['crotch']."&knee_length=".$row['knee_length']."&round_knee=".$row['round_knee']."&trouser=".$row['trouser']."&ankle=".$row['ankle']."'>View Details</a></td>";
    echo "<td ><a style='color:red;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='dashboard.php?iddd=" . $row['id']."&name=".$row['name']."&shoulder=".$row['shoulder']."&chest=".$row['chest']."&sslength=".$row['sslength']."&lslength=".$row['lslength']."&elbow_length=".$row['elbow_length']."&round_elbow=".$row['round_elbow']."&wrist=".$row['wrist']."&arm=".$row['arm']."&neck=".$row['neck']."&uhip=".$row['uhip']."&waist=".$row['waist']."&lhip=".$row['lhip']."&thigh=".$row['thigh']."&crotch=".$row['crotch']."&knee_length=".$row['knee_length']."&round_knee=".$row['round_knee']."&trouser=".$row['trouser']."&ankle=".$row['ankle']."'>Remove From List</a></td>";
echo "</tr>";
$inc++;
}
echo "</tbody>";
echo "</table>";
echo "</div>";
echo "</center>";

?>




























    
    <!-- JS here -->
<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- Date Picker -->
<script src="./assets/js/gijgo.min.js"></script>
<!-- Nice-select, sticky -->
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>
<!-- Progress -->
<script src="./assets/js/jquery.barfiller.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="./assets/js/jquery.counterup.min.js"></script>
<script src="./assets/js/waypoints.min.js"></script>
<script src="./assets/js/jquery.countdown.min.js"></script>
<script src="./assets/js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->	
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>

                


</body>




</html>
