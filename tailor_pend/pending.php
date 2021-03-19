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
    
    
    
    <!-- Favicons -->
  <link href="js/img/favicon.png" rel="icon">

  
  <!-- Template Main CSS File -->
  <link href="js/css/style.css" rel="stylesheet">
    
    
     <link href="css/style.css" rel="stylesheet">
    
     <!-- Template Main JS File -->
     <script src="assets/js/main.js"></script>


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
    
    
    
     <!-- Vendor CSS Files -->
  <link href="js/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="js/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="js/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="js/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="js/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="js/vendor/aos/aos.css" rel="stylesheet">

    
    
    
     <!-- Vendor CSS Files(lumia) -->
     <link href="js/bootstrap.min.css" rel="stylesheet">
     <link href="js/icofont/icofont.min.css" rel="stylesheet">
  <link href="js/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="js/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

    
    
    
</head>   


<style>
    .input{
        width: 150px;
        height: 30px;
        border: 200px #ffcc66;
        background-color: white;
        border-color: red;
        border-radius: 20px;
        margin-left: 25px;
        font-size: 15px;
        color: #000;
        font-family: Open Sans;
        
    }
    .input:hover{
        background-color: #cccccc;
    }
    
    .into{
        width: 200px;
        height: 30px;
        border: 40px #ffcc66;
        background-color: white;
        border-color: #ffcc66;
        border-radius: 20px;
        margin-left: 10px;
         font-size: 15px;
        color: #000;
        font-family: Open Sans;
        
    }
    .into:hover{
         background-color: #cccccc;
    }
    .butt{
        border: 1px solid whitesmoke;
        background-color: #9999ff;
        border-color: white;
        margin-left: -650px;
        width: 100px;
        height: 40px;
        border-radius: 20px;
        font-family: Times New Roman;
        
    }
    .butt:hover{
        background-color: #999999;
    }
    
</style>

<?php
//This is the counter for the alert

$link = mysqli_connect("localhost", "root", "", "customer");


$days_remaining = "";


$count1 = "";
          $incs=1;


$merge = mysqli_query($link, "SELECT * FROM measurement");
        while ($row = mysqli_fetch_assoc($merge)){
             $get_dailyenddate = $row['enddate'];
 
    //GET NUMBER OF MONTHS & DAYS LEFT
      $original_reminder  = date('Y-m-d', strtotime($get_dailyenddate));
                    $dated = strtotime("$original_reminder");
                    
            $remaining_seconds = $dated - time();
          
                
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining_seconds / 86400);  
               if($days_remaining < 7){
                $count1 = $incs;

            $incs++;  
               }
             
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


    
    <section style="background-color: #124364;" id="portfolio" class="portfolio">
        <center>
            <div style="color: white; font-size: 35px;font-family: Times New Roman;">PACE YOUR ORDER
            </div>
        </center>
   
    
    <?php
    
    $link = mysqli_connect("localhost", "root", "", "bookings");
    $display_name = "";
    $display_email ="";
     $display_style ="";
     $display_message ="";
     $display_phone ="";
      $id = "";
        
     if(isset($_GET['name'])){
        $display_name = $_GET['name'];
            $display_phone = $_GET['phone'];
             $display_email = $_GET['email'];
              $display_style = $_GET['style'];
               $display_message = $_GET['message'];
       
    }
            
            
          
        
        
    
    $check_name = "";
    
     if(isset($_POST['reg_send'])){ 
        $reg_name = $_POST['reg_name'];
        
        $reg_phone = $_POST['reg_phone'];
        
        $reg_email = $_POST['reg_email'];
        
        $reg_style = $_POST['reg_style'];
        
         $reg_message = $_POST['reg_message'];
         
         
       
         $sql = "SELECT * FROM orders WHERE name = '$reg_name'";
         $sql_merge = mysqli_query($link, $sql);
         while( $row = mysqli_fetch_assoc($sql_merge)){
             $check_name = $row ['phone'];
         }
         if($check_name == ""){
             
              $sql_submit = "INSERT INTO orders (name, phone, email, style, message, Pending) VALUES('$reg_name', '$reg_phone', '$reg_email', '$reg_style', '$reg_message', 'Pending')";
        
        $merge = mysqli_query($link, $sql_submit);
       
         // printf("Errormessage: %s\n", mysqli_error($link));
        if($merge== true){
            echo "<script>alert('Success: Your order has been sent')</script>";
            
            
        } else{
             echo "<script>alert('Error: Order not sent')</script>";
            
        }
       
        } else{
             echo "<script>alert('You have placed an order!!!')</script>";
        }
         
         
         
    
     }
     $get_name = $get_phone = $get_email =  $get_style =  $get_message = "";
     
     if(isset($_POST['reg_search'])){
        $reg_find = $_POST['reg_find'];
        
        $sql_search = "SELECT * FROM orders WHERE name = '$reg_find'";
        $merge = mysqli_query($link, $sql_search);
      //  printf("Errormessage: %s\n", mysqli_error($link));
        While ($row = mysqli_fetch_assoc($merge)){
                $get_name = $row['name'];
                 $get_phone = $row['phone'];
                  $get_email = $row['email'];
                   $get_style = $row['style'];
                    $get_message = $row['message'];
                    
                    $id = $row['id'];
        }
        
        $_SESSION['id'] = $id;
     }
     
 

     
     if(isset($_POST['reg_accept'])){
         
         $reg_name = $_POST['reg_name'];
        
        $reg_phone = $_POST['reg_phone'];
        
        $reg_email = $_POST['reg_email'];
        
        $reg_style = $_POST['reg_style'];
        
         $reg_message = $_POST['reg_message'];
         
         
         
          $id = $_SESSION['id'];
         
         $sql_update = "UPDATE orders SET name = '$reg_name', phone = '$reg_phone', email = '$reg_email', style = '$reg_style', message = '$reg_message', status = 'Accepted' WHERE id = '$id'";
             $merge_update = mysqli_query($link, $sql_update);
             
             
             
              if($merge_update==true){
            echo "<script>alert('$reg_name is now accepted')</script>";
        }else{
            echo "<script>alert('contact Admin')</script>";
        }



     }
    
     
     
     
     
                 
    if(isset($_GET['iddd'])){
        $id = $_GET['iddd'];
        $name = $_GET['name'];
        
        $_SESSION['id'] = $id;
       $sql_delete = "DELETE FROM orders WHERE id = '$id'";
        $merge_delete = mysqli_query($link, $sql_delete);
        
        if($merge_delete== true){
            echo "<script>alert('Deleted')</script>";
            
        }
        
    }
    
    
    
    $reg_name = "";
    
    if(isset($_POST['reg_reject'])){
        $name = $_POST['reg_name'];
        $phone = $_POST['reg_phone'];
        $email = $_POST['reg_email'];
        $style = $_POST['reg_style'];
        $message = $_POST['reg_message'];
        
                 $id = $_SESSION['id'] ;
       $sql_delete1 = "DELETE FROM orders WHERE id = '$id'";
        $merge_delete1 = mysqli_query($link, $sql_delete1);
        
        if($merge_delete1== true){
            echo "<script>alert('Deleted')</script>";
            
        }
        
    }
    ?>
    
    
    
    
    
    
    <br>
    
    
    
        <form style="margin-left: 400px;"  name="search" action="pending.php" method="POST" enctype="multipart/form-data">
        <input  type="text" style="width: 300px;" value="<?php echo "$display_name";?>" placeholder="" name="reg_find" id="autocomplete" required="true" maxlength="50">
                <input type="submit" value="View Details"  name="reg_search">
    </form>
         </section>
    
    
    
    <form style="width: 2000px; height: 500px; background-color: black;"  name="order" action="pending.php" method="POST" enctype="multipart/form-data">
        <br><br>
            <label style="font-size: 15px; margin-left: 20px; color: white; font-family: Georgia;">NAME:</label>
            <input class="input" type="text" name="reg_name" readonly="" value="<?php echo "$get_name";?>" required="true" placeholder="Ener Your Name" size="50" />
             <label style="font-size: 15px; color: white; margin-left: 350px; font-family: Georgia;">PHONE No:</label>
             <input class="into" type="number" name="reg_phone"  value="<?php echo "$get_phone";?>" required="true" placeholder="Ener Your Phone Number" maxlength="50" />
        <br><br><br>
        <label style="font-size: 15px; margin-left: 20px; color: white; font-family: Georgia;">EMAIL:</label>
        <input class="input" type="email" name="reg_email" value="<?php echo "$get_email";?>"  placeholder="Ener Your Email" size="50" />
            <label style="font-size: 15px; color: white; margin-left: 300px; font-family: Georgia;">CHOOSE STYLE:</label>
            <select name="reg_style"  style="width: 200px; font-size: 15px;" required="true" class="input" placeholder="Choose Your Style">
                 <option  value="<?php echo "$get_style";?>"><?php echo "$get_style";?></option>
                <option>AGBADA</option>
                <option>CASUALS</option>
                <option>SUITE</option>
                <option>KAFTAN</option>
            </select>
         <br><br>
       <center>
         <label style="font-size: 15px; color: white; font-family: Georgia; margin-left: -1500px;">(OPTIONAL):</label>
         <br>
      
         <textarea  name="reg_message" rows="25" value="<?php echo "$get_message";?>" readonly="" placeholder="<?php echo "$get_message";?>" style="width: 1300px; height: 100px; font-family: Open Sans; font-size: 35px; margin-left: -650px;"></textarea>
       </center>
         <br><br>
         <center>
             
             <input class="butt" type="submit" value="ACCEPT" name="reg_accept" />
             <input style="margin-left: 100px; color: white; background-color: red;" class="butt" type="submit" value="REJECT" name="reg_reject" />
              
         </center>
        
    </form>
    
    
    
    
    
     <script src="js/vendor/jquery/jquery.min.js"></script>
  <script src="js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="js/vendor/php-email-form/validate.js"></script>
  <script src="js/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="js/vendor/counterup/counterup.min.js"></script>
  <script src="js/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="js/vendor/venobox/venobox.min.js"></script>
  <script src="js/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="js/vendor/typed.js/typed.min.js"></script>
  <script src="js/vendor/aos/aos.js"></script>

    
    
    
    
    
    
    
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



<!-- Jquery Plugins, main Jquery -->	
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>

 
</body>




</html>