<?php
session_start();
?>


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

$link = mysqli_connect("localhost", "root", "", "customer");


$days_remaining = "";


$count1 = "";
          $inc=1;
$stat_pend = "";

$merge = mysqli_query($link, "SELECT * FROM measurement");
        while ($row = mysqli_fetch_assoc($merge)){
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
    $merge2 = mysqli_query($link, $sql_join);
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
    
    <header style="background-color: whitesmoke;">
        
         <div class="header-area header_area">
            <div class="main-header">
             <div class="header-bottom header-sticky">
        
        <div class="logo">
            <a style="margin-left: 60px;" href="index2.php"></a><h1 style="font-size: 35px;">PENDING</h1>
        </div>
       
          <div class="header-left  d-flex f-right align-items-center">
              
       <div class="main-menu f-right d-none d-lg-block">
                        <nav> 
                            <ul id="navigation">                                                                                                                                     
                                <li ><a style="margin-left: -400px; color:  black;" href="admin_login.php">Home</a></li>
                               <li><a style="margin-left: -300px;" href="request.php">Request<b style="margin-left: 20px; color: green;"><?php echo "$count2";?></b></a></li>
                               
                               <li><a style="margin-left: -200px;" href="dashboard.php">Dashboard</a></li>
                                <li><a style="margin-left: -100px;" href="Alert.php">Alert<b style="margin-left: 20px; color: red;"><?php echo "$count1";?></b></a></li>
                                  
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
//        $id =  $_SESSION['id'];
$connect = mysqli_connect("localhost", "root", "", "bookings");

 
 
 
//    if(isset($_GET['iddd'])){
//        $id = $_GET['iddd'];
//        $name = $_GET['name'];
//        
//        $_SESSION['id'] = $id;
//       $sql_delete = "DELETE FROM orders WHERE id = '$id'";
//        $merge_delete = mysqli_query($link, $sql_delete);
//        
//        if($merge_delete== true){
//            echo "<script>alert('Deleted')</script>";
//            
//        }
//        
//    }
        
    
  
$inc = 1;
$sql_style =  "SELECT * FROM orders";
$result = mysqli_query($connect, $sql_style);

echo "<center>";
echo "<div class='container'>";
echo "<h1 style='font-size: 35px; color: white;'> Pending  </h1>";
echo "<table border='1' class='table table-sm table-hover table-light'>";
echo "<thead class='thead-light'>";
echo "<tr>";
echo "<th>S/N</th>";
echo "<th>Name</th>";
echo "<th>Phone</th>";
echo "<th>Email</th>";
echo "<th>Style</th>";
echo "<th>Message</th>";
echo "<th>Date</th>";
echo "<th>status</th>";

echo "<th>View Details</th>";

echo "<th>Delete</th>";
echo "</tr>";
echo "</thead>";



while ($row = mysqli_fetch_assoc($result)){
echo "<tbody>";
    echo "<tr>";
echo "<td>".$inc."</td>";
echo "<td>".$row['name']."</td>";
 echo "<td>".$row['phone']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['style']."</td>";
echo "<td>".$row['message']."</td>";
echo "<td>".$row['date']."</td>";
echo "<td>".$row['status']."</td>";

echo "<td><a style= 'color: blue;' href= 'pending.php?phone=" .$row['phone']."&name=".$row['name']."&email=".$row['email']."&style=".$row['style']."&message=".$row['message']."'>View Details</a></td>";
echo "<td ><a style='color:red;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='pending.php?iddd=" . $row['id']."&name=".$row['name']."&phone=".$row['phone']."&email=".$row['email']."&style=".$row['style']."&message=".$row['message']."'>Delete</a></td>";
echo "</tr>";
$inc++;
}
echo "</tbody>";
echo "</table>";
echo "</div>";
echo "</center>";

?>

    
    
    
    
    
    
    
</body>

    
    
    
    
    
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

</html>