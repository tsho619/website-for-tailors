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
    
     <!-- Template Main JS File -->
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
    
    <header style="background-color: whitesmoke;">
        
         <div class="header-area header_area">
            <div class="main-header">
             <div class="header-bottom header-sticky">
        
        <div class="logo">
            <a style="margin-left: 60px; " href="index2.php"></a><h1 style="font-size: 35px;">CUSTOMERS</h1>
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
    
    $check_name= "";
    $receive_name = "";
    
    
    if(isset($_GET['name'])){
        $receive_name = $_GET['name'];
    
    }
       
      if(isset($_GET['name'])){
        $display_name = $_GET['name'];
            $display_shoulder = $_GET['shoulder'];
             $display_chest = $_GET['chest'];
              $display_sslength = $_GET['sslength'];
               $display_lslength = $_GET['lslength'];
               $display_elbow_length = $_GET['elbow_length'];
               $display_round_elbow = $_GET['round_elbow'];
            $display_wrist = $_GET['wrist'];
             $display_arm = $_GET['arm'];
             $display_neck = $_GET['neck'];
        $display_uhip = $_GET['uhip'];
        $display_waist = $_GET['waist'];
        $display_lhip = $_GET['lhip'];
        $display_thigh = $_GET['thigh'];
        $display_crotch = $_GET['crotch'];
        $display_knee_length = $_GET['knee_length'];
        $display_round_knee = $_GET['round_knee'];
        $display_trouser = $_GET['trouser'];
        $display_ankle = $_GET['ankle'];
       
 
    }
   
    
    if(isset($_POST['reg_submit'])){ 
        $reg_name = $_POST['reg_name'];
        $reg_shoulder = $_POST['reg_shoulder'];
       $reg_chest = $_POST['reg_chest'];
       $reg_sslength = $_POST['reg_sslength'];
       $reg_lslength = $_POST['reg_lslength'];
       $reg_elbow_length = $_POST['reg_elbow_length'];
       $reg_round_elbow = $_POST['reg_round_elbow'];
       $reg_wrist = $_POST['reg_wrist'];
       $reg_arm = $_POST['reg_arm'];
       $reg_neck = $_POST['reg_neck'];
       $reg_uhip = $_POST['reg_uhip'];
       $reg_waist = $_POST['reg_waist'];
       $reg_lhip = $_POST['reg_lhip'];
       $reg_thigh = $_POST['reg_thigh'];
       $reg_crotch = $_POST['reg_crotch'];
       $reg_knee_length = $_POST['reg_knee_length'];
       $reg_round_knee = $_POST['reg_round_knee'];
       $reg_trouser = $_POST['reg_trouser'];
       $reg_ankle = $_POST['reg_ankle'];
        $reg_enddate = $_POST['reg_enddate'];
        
        
       
        
        
        
        
//        $target_dir = "images/"; //this is the directory to upload to
//        //get file name and set to directory
//        $target_file = ($target_dir . basename($_FILES["fileToUpload"]["name"]));
//        //$target_file = images/name.jpg
//       
//       
       
        $sql_check_name = "SELECT * FROM measurement WHERE name = '$reg_name'";
        $merge_find = mysqli_query($link, $sql_check_name);
        While ($row = mysqli_fetch_assoc($merge_find)) {
            $check_name = $row['name'];
        }
        
        if($check_name== ""){
        
        
//            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        
       
        $sql_submit = "INSERT INTO measurement (name, shoulder, chest, sslength, lslength, elbow_length, round_elbow, wrist, arm, neck, uhip, waist, lhip, thigh, crotch, knee_length, round_knee, trouser, ankle, enddate, status) VALUES('$reg_name', '$reg_shoulder', '$reg_chest', '$reg_sslength', '$reg_lslength', '$reg_elbow_length', '$reg_round_elbow', '$reg_wrist', '$reg_arm', '$reg_neck', '$reg_uhip', '$reg_waist', '$reg_lhip', '$reg_thigh', '$reg_crotch', '$reg_knee_length', '$reg_round_knee', '$reg_trouser', '$reg_ankle', '$reg_enddate', 'Pending')";
        
        $merge = mysqli_query($link, $sql_submit);
       // printf("Errormessage: %s\n", mysqli_error($link));
        if($merge== true){
            echo "<script>alert('Success: $reg_name is now registered in the database')</script>";
            
            
        } else{
             echo "<script>alert('Error: $reg_name is not registered in the database')</script>";
            
        }
       
        } else{
             echo "<script>alert('$reg_name is already in the database!!!')</script>";
        }
    }
    
    
     $get_name = $get_shoulder = $get_chest = $get_sslength = $get_lslength = $get_elbow_length = $get_round_elbow = $get_wrist = $get_arm = $get_neck = $get_uhip = $get_waist = $get_lhip = $get_thigh = $get_crotch = $get_knee_length = $get_round_knee = $get_trouser = $get_ankle = $get_Pending = "";
    if(isset($_POST['reg_search'])){
        $reg_find = $_POST['reg_find'];
        
        $sql_search = "SELECT * FROM measurement WHERE name = '$reg_find'";
        $merge = mysqli_query($link, $sql_search);
      //  printf("Errormessage: %s\n", mysqli_error($link));
        While ($row = mysqli_fetch_assoc($merge)){
                $get_name = $row['name'];
                  $get_shoulder = $row['shoulder'];
                  $get_chest = $row['chest'];
                  $get_sslength = $row['sslength'];
                  $get_lslength = $row['lslength'];
                  $get_elbow_length = $row['elbow_length'];
                  $get_round_elbow = $row['round_elbow'];
                  $get_wrist = $row['wrist'];
                  $get_arm = $row['arm'];
                  $get_neck = $row['neck'];
                  $get_uhip = $row['uhip'];
                  $get_waist = $row['waist'];
                  $get_lhip = $row['lhip'];
                  $get_thigh = $row['thigh'];
                  $get_crotch = $row['crotch'];
                  $get_knee_length = $row['knee_length'];
                  $get_round_knee = $row['round_knee'];
                  $get_trouser = $row['trouser'];
                  $get_ankle = $row['ankle'];
                  $get_enddate = $row['enddate'];
                 
                 
                    $id = $row['id'];
        }
   
                $_SESSION['id'] = $id;
    }
    
    
    
    
         if(isset($_POST['reg_update'])){
        $reg_name = ($_POST['reg_name']);
       $reg_shoulder = ($_POST['reg_shoulder']);
       $reg_chest = ($_POST['reg_chest']);
       $reg_sslength = ($_POST['reg_sslength']);
       $reg_lslength = ($_POST['reg_lslength']);
       $reg_elbow_length = ($_POST['reg_elbow_length']);
       $reg_round_elbow = ($_POST['reg_round_elbow']);
       $reg_wrist = ($_POST['reg_wrist']);
       $reg_arm = ($_POST['reg_arm']);
       $reg_neck = ($_POST['reg_neck']);
       $reg_uhip = ($_POST['reg_uhip']);
       $reg_waist = ($_POST['reg_waist']);
       $reg_lhip = ($_POST['reg_lhip']);
       $reg_thigh = ($_POST['reg_thigh']);
       $reg_crotch = ($_POST['reg_crotch']);
       $reg_knee_length = ($_POST['reg_knee_length']);
       $reg_round_knee = ($_POST['reg_round_knee']);
       $reg_trouser = ($_POST['reg_trouser']);
       $reg_ankle = ($_POST['reg_ankle']);
       $reg_enddate = ($_POST['reg_enddate']);
       
       
       
        
        
                $id = $_SESSION['id'];
        
        $sql_update = "UPDATE measurement SET name = '$reg_name', shoulder = '$reg_shoulder', chest = '$reg_chest', sslength = '$reg_sslength', lslength = '$reg_lslength', elbow_length = '$reg_elbow_length', round_elbow = '$reg_round_elbow', wrist = '$reg_wrist', arm = '$reg_arm', neck = '$reg_neck', uhip = '$reg_uhip', waist = '$reg_waist', lhip = '$reg_lhip', thigh = '$reg_thigh', crotch = '$reg_crotch', knee_length = '$reg_knee_length', round_knee = '$reg_round_knee', trouser = '$reg_trouser', ankle = '$reg_ankle', enddate = '$reg_enddate', status = 'Delivered' WHERE id = '$id'";
        $merge_update = mysqli_query($link, $sql_update);
//        printf("Errormessage: %s\n", mysqli_error($link));
        
        
        if($merge_update==true){
            echo "<script>alert('$reg_name is now updated in the database')</script>";
        }else{
            echo "<script>alert('contact Admin')</script>";
        }
        
        
        
        
        
        
        
        
        
         }
        
                    
    if(isset($_GET['iddd'])){
        $id = $_GET['iddd'];
        $name = $_GET['name'];
        
        $_SESSION['id'] = $id;
       $sql_delete = "DELETE FROM measurement WHERE id = '$id'";
        $merge_delete = mysqli_query($link, $sql_delete);
        
        if($merge_delete== true){
            echo "<script>alert('Deleted')</script>";
            
        }
        
    }
        
         
         
         
        
 
         
         
         
         
    
    ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <center>
        <div style='border: 3px solid #9eeaf6; width: 560px; height: 1300px; border-radius: 25px;
             border-top-width: 20px; border-top-color: #46badd; padding: 15px; background-color: #333333'>
       
            <form name="search" action="dashboard.php" method="POST" enctype="multipart/form-data">
                <input  type="text" style="width: 300px;" value="<?php echo "$receive_name";?>" placeholder="search name here" name="reg_find" id="autocomplete" required="true" maxlength="50">
                <input type="submit" value="View Details"  name="reg_search">
                
            
            </form>     
          <br><br>  
            
          <form action="dashboard.php" method="POST" enctype="multipart/form-data">
            <label style='font-size: 35px; color: #ffff99; font-family: Open Sans'>Measurement Form </label>
            
           
            <input id="textbox_style" type='date' value="<?php echo "$get_enddate";?>" placeholder="Enter Collection Date" data-rule="minlen:4" data-msg="Please enter date of collection" onfocus="this.type='date'" name='reg_enddate'  required="true" maxlength="50"/>
            
        <br>
        <br>
        
        
        <input id="textbox_style" type='text' value="<?php echo "$get_name";?>" placeholder='Enter name here' name='reg_name'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_shoulder";?>" placeholder='Enter name here' name='reg_shoulder'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_chest";?>" placeholder='Enter name here' name='reg_chest'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_sslength";?>" placeholder='Enter name here' name='reg_sslength'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_lslength";?>" placeholder='Enter name here' name='reg_lslength'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_elbow_length";?>" placeholder='Enter name here' name='reg_elbow_length'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_round_elbow";?>" placeholder='Enter name here' name='reg_round_elbow'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_wrist";?>" placeholder='Enter name here' name='reg_wrist'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_arm";?>" placeholder='Enter name here' name='reg_arm'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_neck";?>" placeholder='Enter name here' name='reg_neck'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_uhip";?>" placeholder='Enter name here' name='reg_uhip'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_waist";?>" placeholder='Enter name here' name='reg_waist'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_lhip";?>" placeholder='Enter name here' name='reg_lhip'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_thigh";?>" placeholder='Enter name here' name='reg_thigh'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_crotch";?>" placeholder='Enter name here' name='reg_crotch'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_knee_length";?>" placeholder='Enter name here' name='reg_knee_length'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_round_knee";?>" placeholder='Enter name here' name='reg_round_knee'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_trouser";?>" placeholder='Enter name here' name='reg_trouser'  required="true" maxlength="50"/>
        
        <br>
        <br>
       <input id="textbox_style" type='text' value="<?php echo "$get_ankle";?>" placeholder='Enter name here' name='reg_ankle'  required="true" maxlength="50"/>
        
        <br>
        <br>
       
        
        <br>
        <br>
<!--        <input style="border-color: whitesmoke; font-size: 22px; border-radius: 10px; color:#ffffcc; background-color: green; color: white;" type="submit" name='reg_submit' value="Register">-->
    
     
        <input style="border-color: whitesmoke; font-size: 22px; border-radius: 10px; color:black; background-color: green; color: white;" type="submit" name="reg_update" value="Mark as Delivered">
 
        
        </form>
    </center>
        
        
        
        
        <script type='text/javascript'>
              $(function(){
                 $("#autocomplete").autocomplete({
                    source: function(request, response){
                        $.ajax({
                           url: "autocomplete.php",
                           type: "post",
                           dataType: "json",
                           data: {
                               search: request.term
                           },
                           success: function(data){
                               response(data);
                           }
                        });
                        
                    },
                    select: function (event, ui){
                        $('#autocomplete').val(ui.item.label); // display selected text
                        return false;
                    }
                 }); 
              });
          </script>
          
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    
    
    
    
    
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
